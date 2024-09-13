<?php

namespace App\Http\Controllers\backend;

use App\Models\Video;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Video';
    protected $base_route = 'video.';
    protected $view_path = 'backend.video.';

    public function __construct()
    {
        $this->model = new Video();
    }

    public function index()
    {
        $data = [];
        $data['videos'] = $this->model->where('type', 'post')->latest()->get();
        $data['video'] = $this->model->where('type', 'page')->first();
        $data['video-slider'] = $this->model->where('type', 'video-slider')->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'description' => 'nullable|max:1500',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'video');
                $data['image'] = $banner;
            }

            $video = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Video Create Successfully',
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
        $data['video'] = $this->model->find($id);
        $data['video-slider'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'description' => 'nullable|max:500',
        ]);

        $video = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($video->image);
                $banner = $this->imageUpload($request->image, 'video');
                $data['image'] = $banner;
            }

            $video->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Video Update Successfully',
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

        $video_id = $request['video_id'];

        $video = $this->model->find($video_id);
        $video->status = $video->status ? '0' : '1';
        $video->save();

        return response()->json([
            'success_message' => 'Video Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $video = $this->model->find($id);

        try {
            deleteImage($video->image);
            $video->delete();
            return response()->json([
                'success_message' => 'Video Deleted Successfully',
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
