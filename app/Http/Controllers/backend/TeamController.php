<?php

namespace App\Http\Controllers\backend;

use App\Models\Team;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Our Team';
    protected $base_route = 'team.';
    protected $view_path = 'backend.team.';

    public function __construct()
    {
        $this->model = new Team();
    }

    public function index()
    {
        $data = [];
        $data['teams'] = $this->model->where('type', 'post')->latest()->get();
        $data['team'] = $this->model->where('type', 'page')->first(); 
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            'rank' =>'required|string|unique:teams,rank',  
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $banner = $this->imageUpload($request->image, 'team');
                $data['image'] = $banner;
            }

            $team = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Team Create Successfully',
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
        $data['team'] = $this->model->find($id); 
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 
            'rank' =>'required|string|unique:teams,rank',  
        ]);

        $team = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                deleteImage($team->image);
                $banner = $this->imageUpload($request->image, 'team');
                $data['image'] = $banner;
            }

            $team->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Team Update Successfully',
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

        $team_id = $request['team_id'];

        $team = $this->model->find($team_id);
        $team->status = $team->status ? '0' : '1';
        $team->save();

        return response()->json([
            'success_message' => 'Team Status Change Successfully',
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy($id)
    {
        $team = $this->model->find($id);

        try {
            deleteImage($team->image);
            $team->delete();
            return response()->json([
                'success_message' => 'Team Deleted Successfully',
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
