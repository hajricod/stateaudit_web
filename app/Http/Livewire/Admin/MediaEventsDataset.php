<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\Admin\MediaEventsController;
use Livewire\Component;
use App\Models\MediaEvent;
use Livewire\WithPagination;

class MediaEventsDataset extends Component
{
    use WithPagination;

    protected $events;
    protected $paginationTheme   = 'bootstrap';
    public    $search            = '';
    public    $perPage           = 10;
    public    $sortField         = "created_at";
    public    $sortAsc           = false;

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

        $mediaEvent = new MediaEventsController();

        $mediaEvent->destroy(MediaEvent::find($id));

        session()->flash('message', __('Record was deleted!'));

    }


    protected function featch() {

        if($this->search != "") {
            $this->resetPage();
        }

        $events = MediaEvent::query()
        
        ->orWhere(function($query) {
            $query->where('title', 'like', '%'.$this->search.'%')
                ->where('title_en', 'like', '%'.$this->search.'%');
        })
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        $this->events = $events; 

    }

    public function render()
    {
        $this->featch();

        return view('livewire.admin.media-events-dataset', [
            'events' => $this->events,
        ]);
    }
}
