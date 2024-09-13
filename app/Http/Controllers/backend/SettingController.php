<?php

namespace App\Http\Controllers\backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;

class SettingController extends BackendBaseController
{
    use ImageTrait;

    protected $model;
    protected $panel= 'Setting';
    protected $base_route = 'setting.';
    protected $view_path = 'backend.setting.';

    public function __construct()
    {   
        $this->model = new Setting();
    }

    public function index(){
        $setting = $this->model->first();
        return view($this->__loadDataToView($this->view_path.'index'),compact('setting'));
    }

    public function store(Request $request){
        $request->validate([
            'email' =>'required',
            'phone' =>'required',
            'address' =>'required'
        ]);

        $data = $request->except('logo','fav_icon','image');

        if($request->hasFile('logo')){
            $logo = $this->imageUpload($request->logo,'setting');
            $data['logo'] = $logo;
        }
        if($request->hasFile('fav_icon')){
            $fav_icon = $this->imageUpload($request->fav_icon,'setting');
            $data['fav_icon'] = $fav_icon;
        }
        if($request->hasFile('image')){
            $image = $this->imageUpload($request->image,'setting');
            $data['image'] = $image;
        }

        $setting = $this->model->create($data+[
            'created_by' =>auth()->user()->id,
        ]);

        return response()->json([
            'success_message' =>'Setting Stored Successfully',
            'url' =>route($this->base_route.'index'),
            'reload' =>true
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'email' =>'required',
            'phone' =>'required',
            'address' =>'required'
        ]);

        $setting = $this->model->first();

        $data = $request->all();

        if($request->hasFile('logo')){
            deleteImage($setting->logo);
            $logo = $this->imageUpload($request->logo,'setting');
            $data['logo'] = $logo;
        }
        if($request->hasFile('fav_icon')){
            deleteImage($setting->fav_icon);
            $fav_icon = $this->imageUpload($request->fav_icon,'setting');
            $data['fav_icon'] = $fav_icon;
        }
        if($request->hasFile('image')){
            deleteImage($setting->image);
            $image = $this->imageUpload($request->image,'setting');
            $data['image'] = $image;
        }
        $setting->update($data +[
            'updated_by' =>auth()->user()->id,
        ]);

        return response()->json([
            'success_message' =>'Setting Updated Successfully',
            'url' =>route($this->base_route.'index'),
            'reload' =>true
        ]);

    }
}
