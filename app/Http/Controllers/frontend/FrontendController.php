<?php

namespace App\Http\Controllers\frontend;

use App\Models\Blog;
use App\Models\Album;
use App\Models\Award;
use App\Models\Video;
use App\Models\Notice;
use App\Models\Contact;
use App\Models\Facility;
use App\Rules\ReCaptcha;
use App\Models\ContactUs;
use App\Models\OurService;
use Illuminate\Http\Request;
use App\Models\ClassInformation;
use App\Http\Controllers\Controller;
use App\Models\AdmissionForm;
use App\Traits\ImageTrait;

class FrontendController extends Controller
{
    use ImageTrait;
    public function index(){
        $data =[];
        $data['introduction'] = OurService::active()->where('slug','introduction')->first();
        $data['awards'] = Award::active()->latest()->where('type','post')->get();  
 
        return view('frontend.index',compact('data'));
    }

    public function noticeModalView(Request $request){
        $notice_id = $request['notice_id'];
        $notice = Notice::find($notice_id);
        return view('frontend.pages.notice-modal',compact('notice'))->render();
    }

    public function noticeAll(){
        $data['notice'] = Notice::where('type','page')->first();
        $data['notices'] = Notice::active()->where('type','post')->latest()->get();
        return view('frontend.pages.notices',compact('data'));
    }

    public function blog(){
        $data['blog'] = Blog::where('type','page')->first();
        $data['blogs'] = Blog::active()->where('type','post')->latest()->get();
        return view('frontend.pages.blog',compact('data'));
    }

    public function blogSinglePage($slug){
        $data =[];
        $data['blog_single'] = Blog::where('slug',$slug)->first();
        $data['blog'] = Blog::where('type','page')->first();
        $data['blogs'] = Blog::active()->where('type','post')->whereNot('id',$data['blog_single']->id)->get();
        return view('frontend.pages.blog-single',compact('data'));

    }

    public function services($cat_slug){ 

        $data = [];
        $data['service'] = OurService::where('slug',$cat_slug)->firstOrfail(); 
        $parent_id = $data['service']->parent_id;
        $data['left_side_navbar'] = OurService::active()->where('parent_id',$parent_id)->get(); 

        return view('frontend.pages.services',compact('data'));
    }  

    public function album(){
        $data =[];
        $data['album'] = Album::where('type','page')->first();
        $data['albums'] = Album::latest()->active()->where('type','post')->get();
        return view('frontend.pages.album',compact('data'));
    }

    public function albumImages($slug){
        $data['album_seo'] = Album::where('type','page')->first();
        $data['album'] = Album::where('slug',$slug)->first();
        $data['album_images'] = $data['album']->images;
        return view('frontend.pages.album_images',compact('data'));
    }

    public function videoGallery(){
        $data['video'] = Video::where('type','page')->first();
        $data['videos'] = Video::active()->latest()->where('type','post')->get();
        return view('frontend.pages.video',compact('data'));
    }

    public function facility(){
        $data =[];
        $data['facility'] = Facility::where('type','page')->first();
        $data['facilities'] = Facility::active()->latest()->where('type','post')->get();
        return view('frontend.pages.facility',compact('data'));
    }

    public function classInformation(){
        $data =[];
        $data['class-info'] = ClassInformation::where('type','page')->first();
        $data['classes-info'] = ClassInformation::active()->where('type','post')->orderBy('rank')->get();
        return view('frontend.pages.class-information',compact('data'));
    }

    public function contactUs(){
        $data['contact'] = Contact::where('type','page')->first();
        return view('frontend.pages.contact',compact('data'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|email',
            'message' => 'required|max:500', 
            'g-recaptcha-response' => ['required', new ReCaptcha]

        ]);

        try {
            $data = $request->all();
            $contact = Contact::create($data);

            return response()->json([
                'success_message' =>'Thank you for your message, we will get back you soon.',
                'url' =>route('frontend.contact'),
                  'reload' =>true,
            ]);
        //    return back()->with('status','Thank you for your message, we will get back you soon.');

        } catch (\Exception $e) {
            return response()->json([
                'error_message' =>'Something went wrong.',
                'url' =>route('frontend.contact'),
            ]);
            // return back()->with('status','Somethig went wrong.');
        }
    }

    public function admissionForm(){
        return view('frontend.pages.admission-form');
    }

    public function admissionFormStore(Request $request){  
        $request->validate([
            'name' =>'required|string|max:30',
            'grade' =>'required',
            'current_grade' =>'required',
            'gender' =>'required',
            'email' =>'required',
            'address' =>'required',
            'phone' =>'required',
            'father_name' =>'required',
            'mother_name' =>'required',
             'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        try{
            $data = $request->except('image');

            if($request->hasFile('image')){
                $image_name = $this->imageUpload($request->image,'registration');
                $data['image'] = $image_name;
            }

            $register = AdmissionForm::create($data);
            return response()->json([
                'success_message' =>'Thank you for your submit, we will contact u soon.',
                'url' => route('frontend.admission_form'),
                 'reload' =>true
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'error_message' =>'Something Went Wrong !!',
                'url' => route('frontend.admission_form'),
                'reload' =>true
            ]);
        }
    }
}
