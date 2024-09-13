<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $data['users'] = User::where('user_role','1')->get();
        return view('backend.dashboard',compact('data'));
    }
}
