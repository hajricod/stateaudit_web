<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComplaintLog;
use Carbon\Carbon;

class ComplaintLogsController extends Controller
{
    public $path = "admin.settings.logs.complaints.";

    public function index()
    {
        return view($this->path.'index');
    }

    public function add($complaint_id, $action) : void {

        $user = auth()->user();
        $complaint = new ComplaintLog();
        $complaintUserLogs = $this->checkUserLog($complaint_id, $user->id, $action);

        if(count($complaintUserLogs) == 0) {

            $complaint->create([
                "complaint_id" => $complaint_id,
                "user_id"      => $user->id,
                "user_name"    => $user->name,
                "action"       => $action
            ]);

        } else {

            foreach ($complaintUserLogs as $complaintUserLog) {
                $complaintUserLog->update(["updated_at" => Carbon::now()]);
            }
        }
    }

    protected function checkUserLog($complaint_id, $user_id, $action)
    {
        return ComplaintLog::where(["complaint_id" => $complaint_id, "user_id" => $user_id, "action" => $action])->get();
    }
}
