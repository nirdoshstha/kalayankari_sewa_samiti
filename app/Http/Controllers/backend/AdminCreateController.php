<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminCreateController extends BackendBaseController
{

    protected $model;
    protected $panel= 'Admin Create';
    protected $base_route = 'admin-create.';
    protected $view_path = 'backend.admin_create.';

    public function __construct()
    {   
        $this->model = new User();
    }

    public function index(){
        $data['rows'] = $this->model->where('user_role','1')->get();
        return view($this->__loadDataToView($this->view_path.'index'),compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'username' =>'required',
            'name' =>'required',
            'email' =>'required|unique:users,email,except,id'
        ]);
        try{
             $data = $request->all();

        $admin = $this->model->create($data + [
            'user_role' => '1', //1=Admin
            'password' => Hash::make('12345'),
        ]);


        return response()->json([
            'success_message' =>'Admin Create Successfully',
            'url' =>route($this->base_route.'index'),
            'reload' =>true
        ]);
        }
        catch(\Exception $e){
            return response()->json([
                'error_message' =>'Something Went Wrong',
                'url' =>route($this->base_route.'index')
            ]);
        }

       
    }

    public function edit($id){
        $data['rows'] = $this->model->where('user_role','1')->get();
        $data['user'] = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path.'index'),compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'username' =>'required',
            'name' =>'required',
            'email' =>'required|unique:users,email,except,id'
        ]);
        
        $user = $this->model->find($id);
        $user->update($request->all() +[
            'name' =>$request->name,
            'username' =>$request->username,
            'email' =>$request->email
        ]);
        return response()->json([
            'success_message'=>'Admin Update Successfully', 
            'url' =>route($this->base_route.'index'),
            'reload' =>true
        ]);
    }

    public function adminBanned(Request $request){
        $user_id = $request['user_id'];
        
        $user = $this->model->where('id',$user_id)->first();
        $user->update([
            'is_banned' =>$user->is_banned ? '0' : '1',
        ]);

        return response()->json([
            'success_message' =>'User Banned Successfully',
            'url' =>route($this->base_route.'index')
        ]);
    }

    public function adminDestroy(Request $request){
        $admin = $this->model->find($request['admin_id']); 
        $admin->delete();
        //  return redirect()->back();
        $update_qty = $this->model->where('user_role','1')->count();
        return response()->json([
            'success_message' =>'Admin Deleted Successfully', 
            // 'update_qty' =>$update_qty
        ]);
    }
}
