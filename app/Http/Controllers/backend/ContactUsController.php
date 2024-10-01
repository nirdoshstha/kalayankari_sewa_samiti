<?php

namespace App\Http\Controllers\backend;

use App\Models\Contact;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdmissionForm;

class ContactUsController extends BackendBaseController
{
    use ImageTrait;
    protected $model;
    protected $panel = 'Contact';
    protected $base_route = 'contact.';
    protected $view_path = 'backend.contact.';

    public function __construct()
    {
        $this->model = new Contact();
    }

    public function index()
    {
        $data = [];
        $data['contacts'] = $this->model->where('type', 'contact')->latest()->get(); 
        $data['contact'] = $this->model->where('type', 'page')->first(); 
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30', 
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('subject')) {
                $banner = $this->imageUpload($request->subject, 'contact');
                $data['subject'] = $banner;
            }

            $contact = $this->model->create($data + [
                'type' => $request->type,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Contact Create Successfully',
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
        $data['contact'] = $this->model->find($id);
        $data['contact-slider'] = $this->model->find($id);
        return view($this->__loadDataToView($this->view_path . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30', 
        ]);

        $contact = $this->model->find($id);

        try {
            $data = $request->all();

            if ($request->hasFile('subject')) {
                deleteImage($contact->subject);
                $banner = $this->imageUpload($request->image, 'contact');
                $data['subject'] = $banner;
            }

            $contact->update($data + [
                'type' => $request->type,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'success_message' => 'Contact Update Successfully',
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

    public function applyContact(){
        $data['contacts'] = Contact::where('type','apply')->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'apply'), compact('data'));

    }

    public function applyAdmission(){
        $data['admissions'] = AdmissionForm::latest()->get();
        return view($this->__loadDataToView($this->view_path . 'admission'), compact('data'));
    }

    public function deleteAdmission($id){
        $admission = AdmissionForm::find($id);
        deleteImage($admission->image);
        $admission->delete();
        return response()->json([
            'success_message' => 'Admission Form Deleted Successfully',
            'url' => route('admission.index'),
            'reload' => true
        ]);

    }
    
    public function destroy($id)
    {
        $contact = $this->model->find($id);

        try {
            deleteImage($contact->subject);
            $contact->delete();
            return response()->json([
                'success_message' => 'Contact Deleted Successfully',
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
