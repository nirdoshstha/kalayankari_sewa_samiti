<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Blog';
    protected $base_route = 'blog.';
    protected $view_path = 'backend.blog.';

    public function __construct()
    {
        $this->model = new Blog();
    }

    public function index()
    {
        $data = [];
        $data['blogs'] = $this->model->where('type', 'post')->latest()->get();
        $data['blog'] = $this->model->where('type', 'page')->first(); 
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:blogs,title', 
            'image' =>'nullable|max:2048'
            // 'rank' =>'required|string|unique:blogs,rank',  
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'blog');
                $data['image'] = $banner;
            }

            $blog = $this->model->create($data + [
                'type' => $request->type,
                'slug' => Str::slug($request->title), 
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Blog Create Successfully',
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
        $data['blog'] = $this->model->find($id); 
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|unique:blogs,title,'.$id ,
            'image' =>'nullable|max:2048'
        ]);

        $blog = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($blog->image);
                $banner = $this->imageUpload($request->image, 'blog');
                $data['image'] = $banner;
            }

            $blog->update($data + [
                'type' => $request->type,
                'slug' => Str::slug($request->title),
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Blog Update Successfully',
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

        $blog_id = $request['blog_id'];

        $blog = $this->model->find($blog_id);
        $blog->status = $blog->status ? '0' : '1';
        $blog->save();

        return response()->json([
            'success_message' => 'Blog Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $blog = $this->model->find($id);

        try {
            deleteImage($blog->image);
            $blog->delete();
            return response()->json([
                'success_message' => 'Blog Deleted Successfully',
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
