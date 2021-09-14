<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    
    public function isAuthorized() {

        $group = Group::find(Auth::user()->group_id);

        if (Gate::denies('group-complaint', $group)) {

            abort(403);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->isAuthorized();

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
        $this->isAuthorized();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->isAuthorized();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        $this->isAuthorized();

        $attachments = [
            $complaint->attch1,
            $complaint->attch2,
            $complaint->attch3,
            $complaint->attch4
        ];
            
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
        $this->isAuthorized();
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
        $this->isAuthorized();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $this->isAuthorized();

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
    }

    public function downloadFile($file)
    {
        $this->isAuthorized();

        return Storage::disk('private')->download("complaints/$file");
    }

    protected function deleteFile($file) 
    {

        $this->isAuthorized();    
        
        $status = Storage::disk('private')->delete("complaints/" . $file);

        return $status;
    }

    public function fetch_data(Request $request)
    {
        $this->isAuthorized();
        
        if($request->ajax()) {
            $sort_by = $request->get('sortby') ? $request->get('sortby') : 'created_at';
            $sort_type = $request->get('sorttype') ? $request->get('sorttype') : 'desc';
            $per_page = $request->get('perpage') ? $request->get('perpage') : 10;
            $search = str_replace(" ", "%", $request->get('search'));
            $complaints = Complaint::
            where('name', 'like', '%'.$search.'%')
            ->orWhere('id_number', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->orWhere('created_at', 'like', '%'.$search.'%')
            ->orWhere('status', 'like', '%'.$search.'%')
            ->orderBy($sort_by, $sort_type)
            ->paginate($per_page)
            ->onEachSide(1);
            return view('admin.complaints.data', compact('complaints'));
        }
    }
}
