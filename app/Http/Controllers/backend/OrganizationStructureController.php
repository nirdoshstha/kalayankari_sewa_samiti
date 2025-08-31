<?php

namespace App\Http\Controllers\backend;

use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrganizationStructure;

class OrganizationStructureController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'OrganizationStructure';
    protected $base_route = 'organization.';
    protected $view_path = 'backend.organization.';

    public function __construct()
    {
        $this->model = new OrganizationStructure();
    }

    public function index()
    {
        $data = [];
        $data['organizations'] = $this->model->where('type', 'post')->latest()->get();
        $data['organization'] = $this->model->where('type', 'page')->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:organizations,rank', 
            'image' => 'nullable|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'organization');
                $data['image'] = $banner;
            }

            $organization = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Organization Create Successfully',
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
        $data['organization'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:organizations,rank',  
            'image' => 'nullable|max:2048',
        ]);

        $organization = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($organization->image);
                $banner = $this->imageUpload($request->image, 'organization');
                $data['image'] = $banner;
            }

            $organization->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Organization Update Successfully',
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

        $organization_id = $request['organization_id'];

        $organization = $this->model->find($organization_id);
        $organization->status = $organization->status ? '0' : '1';
        $organization->save();

        return response()->json([
            'success_message' => 'Organization Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $organization = $this->model->find($id);

        try {
            deleteImage($organization->image);
            $organization->delete();
            return response()->json([
                'success_message' => 'Organization Deleted Successfully',
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
