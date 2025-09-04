<?php

namespace App\Http\Controllers\backend;

use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConstitutionRule;

class ConstitutionRuleController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Constitution & Rule';
    protected $base_route = 'constitution.';
    protected $view_path = 'backend.constitution.';

    public function __construct()
    {
        $this->model = new ConstitutionRule();
    }

    public function index()
    {
        $data = [];

        $data['constitutions'] = $this->model->where('type', 'post')->latest()->get();
        // $data['constitution'] = $this->model->where('type', 'page')->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'constitution');
                $data['image'] = $banner;
            }

            $constitution = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Constitution Create Successfully',
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
        $data['constitution'] = $this->model->find($id);
        $data['constitutions'] = $this->model->where('type', 'post')->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $constitution = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($constitution->image);
                $banner = $this->imageUpload($request->image, 'constitution');
                $data['image'] = $banner;
            }

            $constitution->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Constitution Update Successfully',
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

        $constitution_id = $request['constitution_id'];

        $constitution = $this->model->find($constitution_id);
        $constitution->status = $constitution->status ? '0' : '1';
        $constitution->save();

        return response()->json([
            'success_message' => 'Constitution Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $constitution = $this->model->find($id);

        try {
            deleteImage($constitution->image);
            $constitution->delete();
            return response()->json([
                'success_message' => 'Constitution Deleted Successfully',
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
