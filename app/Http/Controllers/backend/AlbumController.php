<?php

namespace App\Http\Controllers\backend;

use App\Models\Album;
use App\Models\Imageable;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Album';
    protected $base_route = 'album.';
    protected $view_path = 'backend.album.';

    public function __construct()
    {
        $this->model = new Album();
    }

    public function index()
    {
        $data = [];
        $data['albums'] = $this->model->where('type', 'post')->latest()->get();
        $data['album'] = $this->model->where('type', 'page')->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'image' =>'nullable|max:2048',
            'description' => 'nullable|max:1500',
        ]);

        try{
            $data = $request->all();

        if ($request->hasFile('image')) {
            $banner = $this->imageUpload($request->image, 'album');
            $data['image'] = $banner;
        }

        $album = $this->model->create($data + [
            'type' => $request->type,
            'created_by' => auth()->user()->id,
            'slug' => Str::slug($request->title)
        ]);

        if (isset($request->other_image)) {
            $this->storeMultipleImage($album, $request->other_image);
        }

        return response()->json([
            'success_message' => 'Album Create Successfully',
            'url' => route($this->base_route . 'index'),
            'reload' => true
        ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something Went Wrong',
                'url' => route($this->base_route . 'index'), 
            ]);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        $data['album'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'image' =>'nullable|max:2048',
            'description' => 'nullable|max:1500',
        ]);

        $album = $this->model->find($id);

       try{
        $data = $request->all();

        if ($request->hasFile('image')) {
            deleteImage($album->image);
            $banner = $this->imageUpload($request->image, 'album');
            $data['image'] = $banner;
        }

        $album->update($data + [
            'type' => $request->type,
            'slug' => Str::slug($request->title),
            'updated_by' => auth()->user()->id,
        ]);

        if (isset($request->other_image)) {
            $this->storeMultipleImage($album, $request->other_image);
        }

        return response()->json([
            'success_message' => 'Album Update Successfully',
            'url' => route($this->base_route . 'index'),
            'reload' => true
        ]);
       }
       catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something Went Wrong',
                'url' => route($this->base_route . 'index'), 
            ]);
        }
    }

    public function statusChanged(Request $request)
    {

        $album_id = $request['album_id'];

        $album = $this->model->find($album_id);
        $album->status = $album->status ? '0' : '1';
        $album->save();

        return response()->json([
            'success_message' => 'Album Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $album = $this->model->findOrFail($id); 
        try {
           
            if($album->images->count()){
                $image = Imageable::where('imageable_id',$id)->first() ;
                
                // foreach($image as $images){
                //     deleteImage($image->url);
                //      $image->delete();
                // }
                return response()->json([
                    'success_message' => 'You cant delete it, pls delete child data first !!!',
                    'url' => route($this->base_route . 'index'),
                    'reload' =>true
                ]);
                    
                }
                
            deleteImage($album->image);
            $album->delete();

            return response()->json([
                'success_message' => 'Album/Multiple images Deleted Successfully',
                'url' => route($this->base_route . 'index'),
                'reload' => false
            ]);
           
           
        } catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something Went Wrong',
                'url' => route($this->base_route . 'index'),
            ]);
        }
    }
}
