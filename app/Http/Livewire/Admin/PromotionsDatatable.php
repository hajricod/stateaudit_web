<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\Admin\PromotionsController;
use App\Models\Promotion;
use App\Models\PromotionCategory;
use Livewire\Component;
use Livewire\WithPagination;

class PromotionsDatatable extends Component
{
    use WithPagination;

    protected $promotions;
    protected $paginationTheme   = 'bootstrap';
    public    $search            = '';
    public    $perPage           = 10;
    public    $sortField         = "created_at";
    public    $sortAsc           = false;
    public    $promotionCategory = null;

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

        $promotion = new PromotionsController();

        $promotion->destroy(Promotion::find($id));

        session()->flash('message', __('Record was deleted!'));

    }


    protected function featch() {

        if($this->search != "") {
            $this->resetPage();
        }

        $promotions = Promotion::query()
        
        ->orWhere(function($query) {
            $query->where('title', 'like', '%'.$this->search.'%')
                  ->where('description', 'like', '%'.$this->search.'%')
                  ->where('promotion_categories_id', 'like', '%'.$this->promotionCategory.'%');
        })
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        $this->promotions = $promotions; 

        // dd($this->promotionCategory);
    }

    public function render()
    {
        $this->featch();

        return view('livewire.admin.promotions-datatable', [
            'promotions' => $this->promotions,
            'promotionCategories' => PromotionCategory::all()
        ]);
    }
}
