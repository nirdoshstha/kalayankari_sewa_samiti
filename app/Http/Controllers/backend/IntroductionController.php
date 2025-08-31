<?php

namespace App\Http\Controllers\backend;

use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Introduction;

class IntroductionController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Introduction';
    protected $base_route = 'introduction.';
    protected $view_path = 'backend.introduction.';

    public function __construct()
    {
        $this->model = new Introduction();
    }

    public function index()
    {
        $data = [];
        $data['introductions'] = $this->model->where('type', 'post')->latest()->get();
        $data['introduction'] = $this->model->where('type', 'page')->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:introductions,rank', 
            'image' => 'nullable|max:2048',
            'banner' => 'nullable|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image = $this->imageUpload($request->image, 'introduction');
                $data['image'] = $image;
            }
            if ($request->hasFile('banner')) {
                $banner = $this->imageUpload($request->banner, 'introduction');
                $data['banner'] = $banner;
            }
            $introduction = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Introduction Create Successfully',
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
        $data['introduction'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:introductions,rank',  
            'image' => 'nullable|max:2048',
            'banner' => 'nullable|max:2048',
        ]);

        $introduction = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($introduction->image);
                $image = $this->imageUpload($request->image, 'introduction');
                $data['image'] = $image;
            }

            if ($request->hasFile('banner')) {
                deleteImage($introduction->banner);
                $banner = $this->imageUpload($request->banner, 'introduction');
                $data['banner'] = $banner;
            }

            $introduction->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Introduction Update Successfully',
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

        $introduction_id = $request['introduction_id'];

        $introduction = $this->model->find($introduction_id);
        $introduction->status = $introduction->status ? '0' : '1';
        $introduction->save();

        return response()->json([
            'success_message' => 'Introduction Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $introduction = $this->model->find($id);

        try {
            deleteImage($introduction->image);
            deleteImage($introduction->banner);
            $introduction->delete();
            return response()->json([
                'success_message' => 'Introduction Deleted Successfully',
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
