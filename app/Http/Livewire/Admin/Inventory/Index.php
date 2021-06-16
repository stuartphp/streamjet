<?php

namespace App\Http\Livewire\Admin\Inventory;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $pageSize=10;
    public $itemForm=false;

    public function render()
    {
        $products = Product::where('company_id', session()->get('company_id'))
            ->paginate($this->pageSize);
        return view('livewire.admin.inventory.index', [
            'products' => $products
        ]);
    }
    public function showItemForm()
    {
        $this->itemForm = true;
    }
}
