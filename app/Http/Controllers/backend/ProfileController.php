<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Traits\ImageTrait;
use App\Models\UserProfile;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordChangedRequest;
use Illuminate\Support\Facades\Config;

class ProfileController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel= 'Profile';
    protected $base_route = 'profile.';
    protected $view_path = 'backend.profile.';

    public function __construct()
    {   
        $this->model = new UserProfile();
    }

    public function index(){
        $data = [];
       
        $data['user_id'] = auth()->user()->id;
        $data['user_profile'] = $this->model->where('user_id',$data['user_id'])->first();

        // dd(auth()->user());
        return view($this->__loadDataToView($this->view_path.'index'),compact('data'));
    }

    public function store(Request $request){
        $data = $request->all();

        if($request['username'] || $request['name']){
             $user = User::updateOrCreate([
            'id' =>auth()->user()->id ?? null
        ],[
            'username' =>$request['username'],
            'name' =>$request['name'], 
        ]);
        }
       

        $user_id = $this->model->where('user_id',auth()->user()->id)->first();

        if($user_id){ 
            if($request->hasFile('image')){ 
                deleteImage($user_id->image); 
               $user_image =$this->imageUpload($request->image,'user_profile');
               $data['image'] = $user_image;
           }
            $profile = $user_id->update($data +[
                'user_id' =>auth()->user()->id,
                'updated_by' =>auth()->user()->id,
            ]);
           
           return response()->json([
            'success_message' =>'Profile Updated Successfully !!',
            'url' =>route($this->base_route.'index')
        ]);
        }
        else{ 
            if($request->hasFile('image')){  
               $user_image =$this->imageUpload($request->image,'user_profile');
               $data['image'] = $user_image;
           } 
           $profile= UserProfile::create($data +[
                'user_id' =>auth()->user()->id,
                'created_by' =>auth()->user()->id,
            ]);
            return response()->json([
                'success_message' =>'Profile Created Successfully !!',
                'url' =>route($this->base_route.'index')
            ]);
        } 
       
      
    }

    public function passwordChanged(PasswordChangedRequest $request){

        $user_id = $request->user_id;
        $new_password =Hash::make($request->new_password);
        $user = User::where('id',$user_id)->first();

        $user->update([
            'password' =>$new_password,
        ]);

        return response()->json([
            'success_message' =>'Password Changed Successfully',
            'url' =>route($this->base_route.'index')
        ]);
        
        
    }
}
