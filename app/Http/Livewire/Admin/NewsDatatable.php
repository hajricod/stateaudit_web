<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\Admin\NewsController;
use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsDatatable extends Component
{
    use WithPagination;

    protected $news;
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

        $news = new NewsController();

        $news->destroy(News::find($id));

    }


    protected function featch() {

        if($this->search != "") {
            $this->resetPage();
        }

        $news = News::query()
        ->orWhere('title', 'like', '%'.$this->search.'%')
        ->orWhere('title_en', 'like', '%'.$this->search.'%')
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        $this->news = $news; 
    }

    public function render()
    {
        $this->featch();

        return view('livewire.admin.news-datatable', [
            'news' => $this->news
        ]);
    }
}
