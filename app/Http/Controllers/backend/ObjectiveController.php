<?php

namespace App\Http\Controllers\backend;

use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Objective;

class ObjectiveController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Objective';
    protected $base_route = 'objective.';
    protected $view_path = 'backend.objective.';

    public function __construct()
    {
        $this->model = new Objective();
    }

    public function index()
    {
        $data = [];
        $data['objectives'] = $this->model->where('type', 'post')->latest()->get();
        $data['objective'] = $this->model->where('type', 'page')->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:objectives,rank', 
            'image' => 'nullable|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'objective');
                $data['image'] = $banner;
            }

            $objective = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'objective Create Successfully',
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
        $data['objective'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:objectives,rank',  
            'image' => 'nullable|max:2048',
        ]);

        $objective = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($objective->image);
                $banner = $this->imageUpload($request->image, 'objective');
                $data['image'] = $banner;
            }

            $objective->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Objective Update Successfully',
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

        $objective_id = $request['objective_id'];

        $objective = $this->model->find($objective_id);
        $objective->status = $objective->status ? '0' : '1';
        $objective->save();

        return response()->json([
            'success_message' => 'Objective Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $objective = $this->model->find($id);

        try {
            deleteImage($objective->image);
            $objective->delete();
            return response()->json([
                'success_message' => 'Objective Deleted Successfully',
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
