<?php

namespace App\Http\Controllers\backend;

use App\Models\Slider;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Slider';
    protected $base_route = 'slider.';
    protected $view_path = 'backend.slider.';

    public function __construct()
    {
        $this->model = new Slider();
    }

    public function index()
    {
        $data = [];
        $data['sliders'] = $this->model->where('type', 'post')->latest()->get();
        $data['slider'] = $this->model->where('type', 'page')->first(); 
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([ 
            'image' =>'nullable|max:2048', 
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'slider');
                $data['image'] = $banner;
            }

            $slider = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Slider Create Successfully',
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
        $data['slider'] = $this->model->find($id); 
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([  
            'image' =>'nullable|max:2048', 
        ]);

        $slider = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($slider->image);
                $banner = $this->imageUpload($request->image, 'slider');
                $data['image'] = $banner;
            }

            $slider->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Slider Update Successfully',
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

        $slider_id = $request['slider_id'];

        $slider = $this->model->find($slider_id);
        $slider->status = $slider->status ? '0' : '1';
        $slider->save();

        return response()->json([
            'success_message' => 'Slider Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $slider = $this->model->find($id);

        try {
            deleteImage($slider->image);
            $slider->delete();
            return response()->json([
                'success_message' => 'Slider Deleted Successfully',
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
