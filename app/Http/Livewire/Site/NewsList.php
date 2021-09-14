<?php

namespace App\Http\Livewire\Site;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsList extends Component
{
    use WithPagination;

    protected $news;
    protected $paginationTheme = 'bootstrap';
    public    $search          = '';
    public    $perPage         = 10;
    public    $sortField       = "created_at";
    public    $sortAsc         = false;
    public    $year;
    public    $type;

    public function mount() {
        
    }

    

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

        $news = News::query()
        ->orWhere('created_at', 'like', '%'.$this->year.'%')
        ->where(function ($query) {
            $query->orWhere('title', 'like', '%'.$this->search.'%')
            ->orWhere('title_en', 'like', '%'.$this->search.'%');
        })
        ->where(function ($query) {
            $query->orWhere('type', 'like', '%'.$this->type.'%');
        })
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        $this->news = $news; 
    }

    public function render()
    {
        $years = News::all()->pluck('created_at')->sortDesc()->map(function($item, $key){
            return $item->format('Y');
        })->unique();

        $this->featch();

        return view('livewire.site.news-list', [
            'news' => $this->news,
            'years'=> $years
        ]);
    }
}
