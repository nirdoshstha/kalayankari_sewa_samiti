<?php

namespace App\Http\Controllers\backend;

use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chairperson;

class ChairpersonController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Chairperson';
    protected $base_route = 'chairperson.';
    protected $view_path = 'backend.chairperson.';

    public function __construct()
    {
        $this->model = new Chairperson();
    }

    public function index()
    {
        $data = [];
        $data['chairpersons'] = $this->model->where('type', 'post')->latest()->get();
        $data['chairperson'] = $this->model->where('type', 'page')->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:chairpersons,rank', 
            'image' => 'nullable|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'chairperson');
                $data['image'] = $banner;
            }

            $chairperson = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Chairperson Create Successfully',
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
        $data['chairperson'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'rank' =>'required|string|unique:chairpersons,rank',  
            'image' => 'nullable|max:2048',
        ]);

        $chairperson = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($chairperson->image);
                $banner = $this->imageUpload($request->image, 'chairperson');
                $data['image'] = $banner;
            }

            $chairperson->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Chairperson Update Successfully',
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

        $chairperson_id = $request['chairperson_id'];

        $chairperson = $this->model->find($chairperson_id);
        $chairperson->status = $chairperson->status ? '0' : '1';
        $chairperson->save();

        return response()->json([
            'success_message' => 'Chairperson Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function statusChangedHome(Request $request)
    {

        $chairperson_id = $request['chairperson_id'];

        $chairperson = $this->model->find($chairperson_id);
        $chairperson->status_home = $chairperson->status_home ? '0' : '1';
        $chairperson->save();

        return response()->json([
            'success_message' => 'Chairperson Status Home Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $chairperson = $this->model->find($id);

        try {
            deleteImage($chairperson->image);
            $chairperson->delete();
            return response()->json([
                'success_message' => 'Chairperson Deleted Successfully',
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
