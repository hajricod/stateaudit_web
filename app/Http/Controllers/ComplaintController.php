<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Notification;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('complaint.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complaint.create');
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
                // $complaint->$attach = $request->file($attach)->getClientOriginalName();
            }

        }

        $message = [
            "title" => "بلاغ جديد",
            "title_en" => "New Compalint"
        ];

        $notification = new Notification($message);

        $notification->save();

        return $complaint->save()? redirect()->back()->with('message', __('Complaint was sent successfully!')): view('/complaint');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        
    }

    protected function validateComplaint() {

        return request()->validate([
            'name'       => 'required',
            'id_number'  => 'required',
            'phone'      => 'required',
            'email'      => 'required',
            'type'       => 'required',
            'details'    => 'required',
            'attch1'     => 'nullable|mimes:jpeg,png,jpg,doc,docx,pdf,xls,xlsx|max:2000',
            'attch2'     => 'nullable|mimes:jpeg,png,jpg,doc,docx,pdf,xls,xlsx|max:2000',
            'attch3'     => 'nullable|mimes:jpeg,png,jpg,doc,docx,pdf,xls,xlsx|max:2000',
            'attch4'     => 'nullable|mimes:jpeg,png,jpg,doc,docx,pdf,xls,xlsx|max:2000',
        ]);

    }

    // protected function uploadFiles(Complaint $complaint, Request $request) {

    //     if ($files = $request->file('image')) {

    //         $file = $request->file('image')->store('public/news');
 
    //         $news->image = str_replace("public/", "", $file);

    //         $news->update($this->validateContent());
              
    //         return redirect('/admin/news');
  
    //     } else {

    //         $news->update($this->validateContent());
              
    //         return redirect('/admin/news');
    //     }
    // }

}
