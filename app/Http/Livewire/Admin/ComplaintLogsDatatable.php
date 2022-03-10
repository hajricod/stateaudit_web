<?php

namespace App\Http\Livewire\Admin;

use App\Models\ComplaintLog;
use Livewire\Component;

class ComplaintLogsDatatable extends Component
{
    protected $complaintLogs;
    protected $paginationTheme = 'bootstrap';
    public    $search          = '';
    public    $perPage         = 10;
    public    $sortField       = "updated_at";
    public    $sortAsc         = false;

    public function clear() {
        $this->search = '';
    }

    public function sortBy($field) {
        if($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    protected function featch() {


        $complaintLogs = ComplaintLog::query()
        ->orWhere('user_id', 'like', '%'.$this->search.'%')
        ->orWhere('complaint_id', 'like', '%'.$this->search.'%')
        ->orWhere('user_name', 'like', '%'.$this->search.'%')
        // ->orWhere('phone', 'like', '%'.$this->search.'%')
        // ->orWhere('accused_party', 'like', '%'.$this->search.'%')
        // ->orWhere('id', 'like', '%'.$this->search.'%')
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);
    

        $this->complaintLogs = $complaintLogs;
    }


    public function render()
    {
        $this->featch();

        return view('livewire.admin.complaint-logs-datatable', [
            'complaintLogs'         => $this->complaintLogs,
        ]);
    }
}
