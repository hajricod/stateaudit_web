<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\ComplaintSent;
use App\Mail\NewComplaint;
use App\Models\Complaint;
use App\Models\ComplaintType;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ComplaintController extends Controller
{
    public $path = 'site.complaint.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->path.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $complaint_types = ComplaintType::all();

        return view($this->path.'create', compact('complaint_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attachments = ['attch1', 'attch2', 'attch3', 'attch4'];

        $complaint = new Complaint($this->validateComplaint());

        foreach ($attachments as $attach) {

            if($request->file($attach)) {
                $file = $request->file($attach)->store('private/complaints');
                $complaint->$attach = str_replace("private/complaints/", "", $file);
            }

        }

        $message = [
            "title" => "بلاغ جديد",
            "title_en" => "New Compalint"
        ];

        $notification = new Notification($message);

        $notification->save();

        $complaint->save();
        
        if($complaint) {

            Mail::send(new ComplaintSent($complaint));
            Mail::send(new NewComplaint($complaint));

            // return redirect()->back()->with('message', __('Complaint was sent successfully!'));
            return redirect('/complaint/success/'.$complaint->id)->with('message', __('Complaint was sent successfully!'));
        }

        return view('/complaint');
    }

    public function success($id, Complaint $complaint) {

        $complaint->findOrFail($id);
        
        return view($this->path.'success', compact('id'));
    }

    protected function validateComplaint() {

        return request()->validate([
            'name'            => 'required',
            'id_number'       => 'required',
            'phone'           => 'required',
            'email'           => 'required|email',
            'accused_party'   => 'required',
            'type_id'         => 'required',
            'details'         => 'required',
            'question_1'      => 'required',
            'question_2'      => 'required',
            'question_3'      => 'required',
            'attch1'          => 'nullable|mimes:jpeg,png,jpg,doc,docx,pdf,xls,xlsx|max:2000',
            'attch2'          => 'nullable|mimes:jpeg,png,jpg,doc,docx,pdf,xls,xlsx|max:2000',
            'attch3'          => 'nullable|mimes:jpeg,png,jpg,doc,docx,pdf,xls,xlsx|max:2000',
            'attch4'          => 'nullable|mimes:jpeg,png,jpg,doc,docx,pdf,xls,xlsx|max:2000',
        ]);     

    }

}
