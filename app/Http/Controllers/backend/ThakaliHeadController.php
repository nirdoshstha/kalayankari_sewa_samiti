<?php

namespace App\Http\Controllers\backend;

use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ThakaliHead;

class ThakaliHeadController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Thakali Head';
    protected $base_route = 'thakali.';
    protected $view_path = 'backend.thakali.';

    public function __construct()
    {
        $this->model = new ThakaliHead();
    }

    public function index()
    {
        $data = [];
        $data['thakalis'] = $this->model->where('type', 'post')->latest()->get();
        $data['thakali'] = $this->model->where('type', 'page')->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:thakalis,rank', 
            'image' => 'nullable|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'thakali');
                $data['image'] = $banner;
            }

            $thakali = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Thakali Create Successfully',
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
        $data['thakali'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:thakalis,rank',  
            'image' => 'nullable|max:2048',
        ]);

        $thakali = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($thakali->image);
                $banner = $this->imageUpload($request->image, 'thakali');
                $data['image'] = $banner;
            }

            $thakali->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Thakali Update Successfully',
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

        $thakali_id = $request['thakali_id'];

        $thakali = $this->model->find($thakali_id);
        $thakali->status = $thakali->status ? '0' : '1';
        $thakali->save();

        return response()->json([
            'success_message' => 'Thakali Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

        public function statusChangedHome(Request $request)
    {

        $thakali_id = $request['thakali_id'];

        $thakali = $this->model->find($thakali_id);
        $thakali->status_home = $thakali->status_home ? '0' : '1';
        $thakali->save();

        return response()->json([
            'success_message' => 'Thakali Status Home Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $thakali = $this->model->find($id);

        try {
            deleteImage($thakali->image);
            $thakali->delete();
            return response()->json([
                'success_message' => 'Thakali Deleted Successfully',
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
