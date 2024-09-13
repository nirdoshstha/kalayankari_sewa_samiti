<?php

namespace App\Http\Controllers\backend;

use App\Models\Award;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AwardController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'School Award';
    protected $base_route = 'award.';
    protected $view_path = 'backend.award.';

    public function __construct()
    {
        $this->model = new Award();
    }

    public function index()
    {
        $data = [];
        $data['awards'] = $this->model->where('type', 'post')->latest()->get();
        $data['award'] = $this->model->where('type', 'page')->first(); 
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            'image' =>'nullable|max:3072'
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'award');
                $data['image'] = $banner;
            }

            $award = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Award Create Successfully',
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
        $data['award'] = $this->model->find($id); 
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 
            'image' =>'nullable|max:3072'
        ]);

        $award = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($award->image);
                $banner = $this->imageUpload($request->image, 'award');
                $data['image'] = $banner;
            }

            $award->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Award Update Successfully',
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

        $award_id = $request['award_id'];

        $award = $this->model->find($award_id);
        $award->status = $award->status ? '0' : '1';
        $award->save();

        return response()->json([
            'success_message' => 'Award Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $award = $this->model->find($id);

        try {
            deleteImage($award->image);
            $award->delete();
            return response()->json([
                'success_message' => 'Award Deleted Successfully',
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
