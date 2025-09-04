<?php

namespace App\Http\Controllers\backend;

use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrganizationStructure;
use App\Models\OrganizationStructurePost;

class OrganizationStructurePostController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Organization Structure Post';
    protected $base_route = 'organization_post.';
    protected $view_path = 'backend.organization_post.';

    public function __construct()
    {
        $this->model = new OrganizationStructurePost();
    }

    public function index()
    {
        $data = [];
        $data['organizations_cat'] = OrganizationStructure::where('type', 'post')->where('status', 1)->latest()->get();
        $data['organization_posts'] = OrganizationStructurePost::active()->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:organization_posts,rank', 
            'image' => 'nullable|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'organization_post');
                $data['image'] = $banner;
            }

            $organization_post = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Organization Post Create Successfully',
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
        $data['organization_post'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:organization_posts,rank',  
            'image' => 'nullable|max:2048',
        ]);

        $organization_post = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($organization_post->image);
                $banner = $this->imageUpload($request->image, 'organization_post');
                $data['image'] = $banner;
            }

            $organization_post->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Organization Post Update Successfully',
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

        $organization_post_id = $request['organization_post_id'];

        $organization_post = $this->model->find($organization_post_id);
        $organization_post->status = $organization_post->status ? '0' : '1';
        $organization_post->save();

        return response()->json([
            'success_message' => 'Organization Post Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $organization_post = $this->model->find($id);

        try {
            deleteImage($organization_post->image);
            $organization_post->delete();
            return response()->json([
                'success_message' => 'Organization Post Deleted Successfully',
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
