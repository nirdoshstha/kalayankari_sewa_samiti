<?php

namespace App\Http\Controllers\backend;

use App\Models\Testimonial;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Testimonial';
    protected $base_route = 'testimonial.';
    protected $view_path = 'backend.testimonial.';

    public function __construct()
    {
        $this->model = new Testimonial();
    }

    public function index()
    {
        $data = [];
        $data['testimonials'] = $this->model->where('type', 'post')->latest()->get();
        $data['testimonial'] = $this->model->where('type', 'page')->first(); 
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            // 'rank' =>'required|string|unique:testimonials,rank',  
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'testimonial');
                $data['image'] = $banner;
            }

            $testimonial = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Testimonial Create Successfully',
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
        $data['testimonial'] = $this->model->find($id); 
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 
            // 'rank' =>'required|string|unique:testimonials,rank',  
        ]);

        $testimonial = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($testimonial->image);
                $banner = $this->imageUpload($request->image, 'testimonial');
                $data['image'] = $banner;
            }

            $testimonial->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Testimonial Update Successfully',
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

        $testimonial_id = $request['testimonial_id'];

        $testimonial = $this->model->find($testimonial_id);
        $testimonial->status = $testimonial->status ? '0' : '1';
        $testimonial->save();

        return response()->json([
            'success_message' => 'Testimonial Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $testimonial = $this->model->find($id);

        try {
            deleteImage($testimonial->image);
            $testimonial->delete();
            return response()->json([
                'success_message' => 'Testimonial Deleted Successfully',
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
