<?php

namespace App\Http\Controllers\backend;

use App\Models\Notice;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Notice';
    protected $base_route = 'notice.';
    protected $view_path = 'backend.notice.';

    public function __construct()
    {
        $this->model = new Notice();
    }

    public function index()
    {
        $data = [];
        $data['notices'] = $this->model->where('type', 'post')->latest()->get();
        $data['notice'] = $this->model->where('type', 'page')->first(); 
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            'image' =>'nullable|max:2048',
            // 'rank' =>'required|string|unique:notices,rank',  
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'notice');
                $data['image'] = $banner;
            }

            $notice = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Notice Create Successfully',
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
        $data['notice'] = $this->model->find($id); 
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 
            'image' =>'nullable|max:2048',
            // 'rank' =>'required|string|unique:notices,rank',  
        ]);

        $notice = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($notice->image);
                $banner = $this->imageUpload($request->image, 'notice');
                $data['image'] = $banner;
            }

            $notice->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Notice Update Successfully',
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

        $notice_id = $request['notice_id'];

        $notice = $this->model->find($notice_id);
        $notice->status = $notice->status ? '0' : '1';
        $notice->save();

        return response()->json([
            'success_message' => 'Notice Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $notice = $this->model->find($id);

        try {
            deleteImage($notice->image);
            $notice->delete();
            return response()->json([
                'success_message' => 'Notice Deleted Successfully',
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
