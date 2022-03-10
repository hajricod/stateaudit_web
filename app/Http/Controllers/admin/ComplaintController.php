<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public $action = [ "show" => 'show', "update" => "update", "delete" => "delete"];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        checkPermission('complaint.view');
        
        $complaints = Complaint::orderBy('created_at', 'desc')->paginate(10)->onEachSide(1);
        return view('admin.complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        checkGroup();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        checkGroup();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        checkPermission('complaint.view');

        $complaint->update(['status_id' => '3']);
        $attachments = [];
        
        $complaint->attch1 ? $attachments[] = $complaint->attch1 : '';
        $complaint->attch2 ? $attachments[] = $complaint->attch2 : '';
        $complaint->attch3 ? $attachments[] = $complaint->attch3 : '';
        $complaint->attch4 ? $attachments[] = $complaint->attch4 : '';

        $complaintLog = new ComplaintLogsController();
        $complaintLog->add($complaint->id, $this->action["show"]);
            
        return view('admin.complaints.show', compact(['complaint', 'attachments']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        checkGroup();
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
        checkGroup();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        checkPermission('complaint.delete');

        $attachments = [
            $complaint->attch1,
            $complaint->attch2,
            $complaint->attch3,
            $complaint->attch4
        ];

        foreach ($attachments as $attachment) {

            if($attachment != "") {
                $this->deleteFile($attachment);
            }
        }

        $complaint->delete();

        $complaintLog = new ComplaintLogsController();
        $complaintLog->add($complaint->id, $this->action["delete"]);
    }

    public function downloadFile($file)
    {

        return Storage::disk('private')->download("complaints/$file");
    }

    protected function deleteFile($file) 
    {
        
        $status = Storage::disk('private')->delete("complaints/" . $file);

        return $status;
    }
}
