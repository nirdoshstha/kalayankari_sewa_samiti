<?php

namespace App\Http\Controllers\backend;

use App\Models\Download;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Download';
    protected $base_route = 'download.';
    protected $view_path = 'backend.download.';

    public function __construct()
    {
        $this->model = new Download();
    }

    public function index()
    {
        $data = [];
        $data['downloads'] = $this->model->where('type', 'post')->orderBy('rank')->get();
        $data['download'] = $this->model->where('type', 'page')->first(); 
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' =>'nullable|max:5120'
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $file = $this->imageUpload($request->image, 'download');
                $data['image'] = $file;
            }

            $download = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Download Create Successfully',
                'url' => route($this->base_route . 'index'),
                'reload' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something Went Wrong',
                'url' => route($this->base_route . 'index'),
                'reload' => true
            ]);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        $data['download'] = $this->model->find($id); 
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 
            'image' =>'nullable|max:5120'
        ]);

        $download = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($download->image);
                $file = $this->imageUpload($request->image, 'download');
                $data['image'] = $file;
            }

            $download->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Download Update Successfully',
                'url' => route($this->base_route . 'index'),
                'reload' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something Went Wrong',
                'url' => route($this->base_route . 'index'),
                'reload' => true
            ]);
        }
    }

    public function statusChanged(Request $request)
    {

        $download_id = $request['download_id'];

        $download = $this->model->find($download_id);
        $download->status = $download->status ? '0' : '1';
        $download->save();

        return response()->json([
            'success_message' => 'Download Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $download = $this->model->find($id);

        try {
            deleteImage($download->image);
            $download->delete();
            return response()->json([
                'success_message' => 'Download Deleted Successfully',
                'url' => route($this->base_route . 'index'),
                'reload' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something Went Wrong',
                'url' => route($this->base_route . 'index'),
            ]);
        }
    }
}
