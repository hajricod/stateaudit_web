<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersDatatable extends Component
{
    use WithPagination;

    protected $users;
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

    protected function featch() {

        if($this->search != "") {
            $this->resetPage();
        }
        

        $users = User::query()
        ->orWhere('name', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        $this->users = $users; 
    }

    public function render()
    {
        $this->featch();

        return view('livewire.admin.users-datatable', [
            'users' => $this->users
        ]);
    }
}
