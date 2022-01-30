<?php

namespace App\Http\Livewire\Admin;

use App\Models\HeaderLink;
use Livewire\Component;

class HeaderLinks extends Component
{
    public $title;
    // public $title_en;
 
    // protected $rules = [
    //     'title' => 'required',
    //     'title_en' => 'required',
    // ];

    // public function submit()
    // {
    //     $this->validate();
 
    //     // Execution doesn't reach here if validation fails.
 
    //     // Contact::create([
    //     //     'name' => $this->name,
    //     //     'email' => $this->email,
    //     // ]);
    // }

    public function changeStatus($status, $record_id) {

        $status? $status = 0 : $status = 1;

        $headerLink = HeaderLink::find($record_id);
        
        $headerLink->update(['status' => $status]);
    }

    public function render()
    {
        return view('livewire.admin.header-links', [
            'headerLinks' => HeaderLink::orderBy('sort')->get()
        ]);
    }
}
