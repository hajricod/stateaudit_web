<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComplaintLog;

class ComplaintLogsController extends Controller
{
    public function add($complaint_id, $action) : void {

        $user = auth()->user();
        $complaint = new ComplaintLog();

        if($this->checkUserAction($complaint_id, $user->id, $action)) {

            $complaint->create([
                "complaint_id" => $complaint_id,
                "user_id"      => $user->id,
                "user_name"    => $user->name,
                "action"       => $action
            ]);
        }
    }

    protected function checkUserAction($complaint_id, $user_id, $action) : bool
    {
        $complaintLog = ComplaintLog::where(["complaint_id" => $complaint_id, "user_id" => $user_id, "action" => $action])->get();

        return count($complaintLog) > 0 ? false : true;
    }
}
