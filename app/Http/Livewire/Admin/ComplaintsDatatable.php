<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\admin\ComplaintController;
use App\Models\Complaint;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ComplaintsDatatable extends Component
{
    use WithPagination;

    protected $complaints;
    protected $paginationTheme = 'bootstrap';
    public    $search          = '';
    public    $perPage         = 10;
    public    $sortField       = "created_at";
    public    $sortAsc         = false;
    public    $itemsSelected   = [];
    public    $fromDate        = '';
    public    $toDate          = '';
    public    $min_date        = '';
    public    $max_date        = '';

    public function mount() {

        $lastComp  = Complaint::latest()->first()->created_at;
        $firstComp = Complaint::oldest()->first()->created_at;

        $this->fromDate = Carbon::createFromFormat('Y-m-d H:i:s', $firstComp)->format('Y-m-d');
        $this->toDate   = Carbon::createFromFormat('Y-m-d H:i:s', $lastComp)->format('Y-m-d');

        $this->min_date = Carbon::createFromFormat('Y-m-d H:i:s', $firstComp)->format('Y-m-d');
        $this->max_date = Carbon::createFromFormat('Y-m-d H:i:s', $lastComp)->format('Y-m-d');
        
    }


    public function clear() {
        $this->search = '';
    }

    public function resetFilter() {
        $this->search = '';
        $this->fromDate = $this->min_date;
        $this->toDate = $this->max_date;
        $this->perPage = '10';
        $this->resetPage();
        $this->itemsSelected = [];
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

        if($this->search != "") {
            $this->resetPage();
        }
        
        if($this->fromDate != "" && $this->toDate != "") {
            $complaints = Complaint::query()
            ->orWhereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $this->fromDate), Carbon::createFromFormat('Y-m-d', $this->toDate)])
            ->where(function ($query) {
                $query->orWhere('name', 'like', '%'.$this->search.'%')
                ->orWhere('id_number', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%');
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        }else {
            $complaints = Complaint::query()
            ->orWhere('name', 'like', '%'.$this->search.'%')
            ->orWhere('id_number', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        }

        $this->complaints = $complaints;
    }

    public function delete($id) {

        $complaint = new ComplaintController();

        $complaint->destroy(Complaint::find($id));

        session()->flash('message', __('Record was deleted!'));

    }

    public function addToItmes($id) {
        if(in_array($id, $this->itemsSelected)) {
            $index = array_search($id, $this->itemsSelected, true);
            unset($this->itemsSelected[$index]);
        }else {
            $this->itemsSelected[] = $id;
        }
    }

    public function deleteRecords() {
        
        if(count($this->itemsSelected) > 0) {
            foreach ($this->itemsSelected as $id) {

                $complaint = new ComplaintController();

                $complaint->destroy(Complaint::find($id));
            }
            session()->flash('message', __('Record was deleted!'));
        }else {
            session()->flash('message', __('Something went wrong!'));
        }
        
    }

    public function render()
    {
        $this->featch();

        return view('livewire.admin.complaints-datatable', [
            'complaints' => $this->complaints
        ]);
    }
}
