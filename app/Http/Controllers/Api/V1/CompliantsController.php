<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComplaintSent;
use App\Mail\NewComplaint;
use App\Models\Complaint;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CompliantsController extends Controller
{
    public function store(Request $request)
    {

        $rules = [
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
        ];     

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())

            return response()->json($validator->errors(), 422);
        

        $attachments = ['attch1', 'attch2', 'attch3', 'attch4'];
        $complaint   = new Complaint();

        foreach ($attachments as $attach) {

            if($request->file($attach)) {
                $file = $request->file($attach)->store('private/complaints');
                $complaint->$attach = str_replace("private/complaints/", "", $file);
            }

        }

        $complaint->name            = $request->name;
        $complaint->id_number       = $request->id_number;
        $complaint->phone           = $request->phone;
        $complaint->email           = $request->email;
        $complaint->accused_party   = $request->accused_party;
        $complaint->type_id         = $request->type_id;
        $complaint->details         = $request->details;
        $complaint->question_1      = $request->question_1;
        $complaint->question_2      = $request->question_2;
        $complaint->question_3      = $request->question_3;
        
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

        }

        return response()->json([
            "message" => __('Complaint was sent successfully!'),
            "id"      => $complaint->id
        ], 200);
    }

    public function success($id, Complaint $complaint) {

        $complaint->findOrFail($id);
        
        return view($this->path.'success', compact('id'));
    }
}
