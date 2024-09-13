<?php

namespace App\Http\Controllers\backend;

use App\Models\Imageable;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassInformation;

class ClassInformationController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Class Information';
    protected $base_route = 'class-information.';
    protected $view_path = 'backend.class_information.';

    public function __construct()
    {
        $this->model = new ClassInformation();
    }

    public function index()
    {
        $data = [];
        $data['classinformations'] = $this->model->where('type', 'post')->orderBy('rank')->get();
        $data['classinformation'] = $this->model->where('type', 'page')->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'image' =>'nullable|max:2048',
            'description' => 'nullable|max:1500',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'classinformation');
                $data['image'] = $banner;
            }

            $classinformation = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
                'slug' => Str::slug($request->title)
            ]); 
            
            return response()->json([
                'success_message' => 'Class Information Create Successfully',
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

    public function edit(Request $request, $id)
    { 
        $data['classinformation'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'image' =>'nullable|max:2048',
            'description' => 'nullable|max:1500',
        ]);

        $classinformation = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($classinformation->image);
                $banner = $this->imageUpload($request->image, 'classinformation');
                $data['image'] = $banner;
            }

            $classinformation->update($data + [
                'type' => $request->type,
                'slug' => Str::slug($request->title),
                'updated_by' => auth()->user()->id,
            ]); 

            return response()->json([
                'success_message' => 'Class Information Update Successfully',
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

    public function statusChanged(Request $request)
    {

        $classinformation_id = $request['classinformation_id'];

        $classinformation = $this->model->find($classinformation_id);
        $classinformation->status = $classinformation->status ? '0' : '1';
        $classinformation->save();

        return response()->json([
            'success_message' => 'Class Information Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $classinformation = $this->model->findOrFail($id);
        try {
            deleteImage($classinformation->image);
            $classinformation->delete();

            return response()->json([
                'success_message' => 'Class Information images Deleted Successfully',
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
