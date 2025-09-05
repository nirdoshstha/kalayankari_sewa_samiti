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
use App\Models\Chairperson;
use App\Models\ConstitutionRule;
use App\Models\Download;
use App\Models\Introduction;
use App\Models\Objective;
use App\Models\OrganizationStructure;
use App\Models\ThakaliHead;
use App\Traits\ImageTrait;

class FrontendController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $data = [];
        $data['introduction'] = Introduction::where('type', 'page')->first();
        $data['objectives'] = Objective::active()->latest()->where('type', 'post')->get();
        $data['chairperson'] = Chairperson::where('type', 'page')->first();
        $data['chairpersons'] = Chairperson::latest()->where('status', 1)->where('type', 'post')->get();
        $data['thakali'] = ThakaliHead::where('type', 'page')->first();
        $data['thakalis'] = ThakaliHead::latest()->where('status', 1)->where('type', 'post')->get();

        return view('frontend.index', compact('data'));
    }

    public function introduction()
    {
        $data = [];
        $data['introduction'] = Introduction::where('type', 'page')->where('status', 1)->first();
        $data['objective'] = Objective::where('type', 'page')->first();
        $data['objectives'] = Objective::active()->latest()->where('type', 'post')->paginate(12);
        $data['chairperson'] = Chairperson::where('type', 'page')->first();
        $data['chairpersons'] = Chairperson::latest()->where('status', 1)->where('type', 'post')->paginate(12);
        $data['thakali'] = ThakaliHead::where('type', 'page')->first();
        $data['thakalis'] = ThakaliHead::latest()->where('status', 1)->where('type', 'post')->paginate(12);

        return view('frontend.pages.introduction', compact('data'));
    }

    public function organizationStructure()
    {
        $data = [];
        $data['organization'] = OrganizationStructure::where('type', 'page')->first();
        $data['organizations'] = OrganizationStructure::active()->where('type', 'post')->get();
        return view('frontend.pages.organization', compact('data'));
    }

    public function download()
    {
        $data = [];
        $data['constitutions'] = ConstitutionRule::active()->where('type', 'post')->latest()->get();;
        $data['download'] = Download::where('type', 'page')->first();
        $data['downloads'] = Download::where('type', 'post')->paginate(10);
        return view('frontend.pages.download', compact('data'));
    }

    public function noticeModalView(Request $request)
    {
        $notice_id = $request['notice_id'];
        $notice = Notice::find($notice_id);
        return view('frontend.pages.notice-modal', compact('notice'))->render();
    }

    public function noticeAll()
    {
        $data['notice'] = Notice::where('type', 'page')->first();
        $data['notices'] = Notice::active()->where('type', 'post')->latest()->get();
        return view('frontend.pages.notices', compact('data'));
    }


    public function contactUs()
    {
        $data['contact'] = Contact::where('type', 'page')->first();
        return view('frontend.pages.contact', compact('data'));
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
                'success_message' => 'Thank you for your message, we will get back you soon.',
                'url' => route('frontend.contact'),
                'reload' => true,
            ]);
            //    return back()->with('status','Thank you for your message, we will get back you soon.');

        } catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something went wrong.',
                'url' => route('frontend.contact'),
                'reload' => true,
            ]);
            // return back()->with('status','Somethig went wrong.');
        }
    }
}
