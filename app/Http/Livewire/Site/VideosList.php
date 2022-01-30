<?php

namespace App\Http\Livewire\Site;

use App\Models\Program;
use App\Models\ProgramList;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class VideosList extends Component
{
    use WithPagination;

    protected  $videos;
    protected  $paginationTheme = 'bootstrap';
    public     $search          = '';
    public     $perPage         = 10;
    public     $sortField       = "created_at";
    public     $sortAsc         = false;
    public     $year;
    public     $type;
    public     $program;
    public     $progid;
    public     $listid;

    // public function mount($progid = null, $listid = null)
    // {
    //     $this->progid = $progid;
    //     $this->listid = $listid;
    // }

    protected function featch() {

        // which program ?
        $this->program = Program::find($this->progid);

        // get the list
        $list = ProgramList::where('id', $this->listid)->get()->first();

        $videos = Video::where('program_id', $this->progid)->paginate(10);

        // some programs have a list
        if($list) {
            $videos = Video::where('program_list', $this->listid)->paginate(10);
        }

        $this->videos = $videos; 
    }

    public function render()
    {

        $this->featch();

        return view('livewire.site.videos-list', [
            'videos' => $this->videos,
            'program'=> $this->program
        ]);
    }
}
