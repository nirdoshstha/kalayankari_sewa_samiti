<?php

namespace App\Http\Controllers\backend;

use App\Models\OurService;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\BackendBaseController;

class OurServiceController extends BackendBaseController
{

    use ImageTrait;

    protected $model;
    protected $panel = 'Page';
    protected $base_route = 'service.';
    protected $view_path = 'backend.service.';

    public function __construct()
    {
        $this->model = new OurService();
    }

    public function index()
    {
        $data = [];
        $data['services'] = $this->model->get();
        $data['categories'] = $this->model->where('parent_id', null)->orderBy('rank','asc')->get();  
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
         
        $request->validate([
            'title' => 'required|string|max:191|unique:our_services,title',  
            'image' =>'nullable|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'service');
                $data['image'] = $banner;
            }

            $service = $this->model->create($data + [
                'slug' => Str::slug($request->title),
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => $this->panel . ' Created Successfully',
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
        $data['service'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:191|unique:our_services,title,'.$id,
            'image' =>'nullable|max:2048',
        ]);

        $service = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($service->image);
                $banner = $this->imageUpload($request->image, 'service');
                $data['image'] = $banner;
            }

            $service->update($data + [ 
                'slug' => Str::slug($request->title),
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => $this->panel . ' Updated Successfully!!!',
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

        $service_id = $request['service_id'];

        $service = $this->model->find($service_id);
        $service->status = $service->status ? '0' : '1';
        $service->save();

        return response()->json([
            'success_message' => $this->panel . ' Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy(Request $request, $id)
    { 
        // $service_id = $request['service_id'];
        $service = $this->model->find($id);
        try {
            if ($service?->subCategories->count()) {
                return response()->json([
                    'error_message' => 'Pls delete child data first',
                    'url' => route($this->base_route . 'index'),
                    'reload' => true
                ]);
            } else {
                deleteImage($service->image);
                $service->delete();
                return response()->json([
                    'success_message' => $this->panel . ' Deleted Successfully',
                    'reload' => true,
                    'url' => route($this->base_route . 'index')
                ],200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something Went Wrong',
                'url' => route($this->base_route . 'index'),
            ]);
        }
    }

    public function getViewData(Request $request){
        $view_id = $request['view_id'];
        $service = $this->model->find($view_id);

        return view($this->view_path . 'view-modal', compact('service'))->render();
    }

    public function getEditData(Request $request){
        $data = [];
        $edit_id = $request['edit_id'];
        $service = $this->model->find($edit_id); 
        $base_route = $this->base_route;
        $data['categories'] = $this->model->where('parent_id', null)->orderBy('rank','asc')->get(); 

        return view($this->view_path.'edit-modal',compact('service','base_route','data'))->render();
    }
}
