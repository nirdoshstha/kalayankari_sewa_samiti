<?php

namespace App\Http\Controllers\backend;
 
use App\Models\Imageable;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facility;

class FacilityController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Facility';
    protected $base_route = 'facility.';
    protected $view_path = 'backend.facility.';

    public function __construct()
    {
        $this->model = new Facility();
    }

    public function index()
    {
        $data = [];
        $data['facilities'] = $this->model->where('type', 'post')->latest()->get();
        $data['facility'] = $this->model->where('type', 'page')->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'description' => 'nullable|max:1500',
        ]);

        try{
            $data = $request->all();

        if ($request->hasFile('image')) {
            $banner = $this->imageUpload($request->image, 'facility');
            $data['image'] = $banner;
        }

        $facility = $this->model->create($data + [
            'type' => $request->type,
            'created_by' => auth()->user()->id,
            'slug' => Str::slug($request->title)
        ]);

        if (isset($request->other_image)) {
            $this->storeMultipleImage($facility, $request->other_image);
        }

        return response()->json([
            'success_message' => 'Facility Create Successfully',
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
        $data['facility'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'description' => 'nullable|max:1500',
        ]);

        $facility = $this->model->find($id);

       try{
        $data = $request->all();

        if ($request->hasFile('image')) {
            deleteImage($facility->image);
            $banner = $this->imageUpload($request->image, 'facility');
            $data['image'] = $banner;
        }

        $facility->update($data + [
            'type' => $request->type,
            'slug' => Str::slug($request->title),
            'updated_by' => auth()->user()->id,
        ]);

        if (isset($request->other_image)) {
            $this->storeMultipleImage($facility, $request->other_image);
        }

        return response()->json([
            'success_message' => 'Facility Update Successfully',
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

        $facility_id = $request['facility_id'];

        $facility = $this->model->find($facility_id);
        $facility->status = $facility->status ? '0' : '1';
        $facility->save();

        return response()->json([
            'success_message' => 'Facility Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $facility = $this->model->findOrFail($id); 
        try {
           
            if($facility->images->count()){
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
                
            deleteImage($facility->image);
            $facility->delete();

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
