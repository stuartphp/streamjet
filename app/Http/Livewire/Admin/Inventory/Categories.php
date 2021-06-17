<?php

namespace App\Http\Livewire\Admin\Inventory;

use Livewire\Component;
use App\Models\ProductCategory;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    public $pageSize=12;
    public $stateForm=false;
    public $sortBy = 'id';
    public $sortAsc = true;
    public $selectCat;
    public $parents;
    public $state;
    public $rules = [
        'state.name' => 'required',
        'state.parent_id' =>'required',
        'state.is_active' =>'boolean',
    ];

    public function mount()
    {
        $this->selectCat = $this->getCategories();
        //dd($this->selectCat);
    }

    public function showForm()
    {
        //$this->reset(['state']);
        $this->stateForm = true;
    }

    public function saveForm()
    {
        $this->validate();
        if(isset($this->state->id))
        {
            $this->state->save();
        }else{
            ProductCategory::create([
                'company_id'=>session()->get('company_id'),
                'name'=>$this->state['name'],
                'parent_id' => $this->state['parent_id'],
                'is_active' => $this->state['is_active'] ?? 0
            ]);
        }
        $this->selectCat = $this->getCategories();
        $this->closeForm();
    }
    public function itemEdit(ProductCategory $item)
    {
        $this->resetErrorBag();
        $this->state = $item;
        $this->stateForm = true;
    }

    public function closeForm()
    {
        $this->reset(['state']);
        $this->stateForm = false;
    }

    public function getCategories()
    {

        $this->parents = ProductCategory::where('company_id', session()->get('company_id'))->where('parent_id', 0)->orderBy('name')->pluck('name', 'id')->toArray();
        return ProductCategory::where('company_id', session()->get('company_id'))
            ->orderBy('parent_id', 'asc')
            ->orderBy('name', 'asc')
            ->get();
    }

    public function render()
    {
        $data = ProductCategory::where('company_id', session()->get('company_id'))
            ->paginate($this->pageSize);
        return view('livewire.admin.inventory.categories',
            [
                'categories' => $data
            ]
        );
    }
}
