<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\admin\FeedbackController;
use App\Models\Feedback;
use Livewire\Component;
use Livewire\WithPagination;

class FeedbackDatatable extends Component
{
    use WithPagination;

    protected $feedback;
    protected $paginationTheme = 'bootstrap';
    public    $search          = '';
    public    $perPage         = 10;
    public    $sortField       = "created_at";
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

    public function delete($id) {

        $feedback = new FeedbackController();

        $feedback->destroy(Feedback::find($id));

        session()->flash('message', __('Record was deleted!'));

    }

    protected function featch() {

        if($this->search != "") {
            $this->resetPage();
        }

        $feedback = Feedback::query()
        ->orWhere('name', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        $this->feedback = $feedback; 
    }

    public function render()
    {
        $this->featch();

        return view('livewire.admin.feedback-datatable', [
            'feedback' => $this->feedback
        ]);
    }
}
