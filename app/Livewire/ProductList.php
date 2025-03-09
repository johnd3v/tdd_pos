<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductList extends Component
{
    use WithPagination;

    public $search = '';


    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(5); 

        return view('livewire.product-list',[
            'products' => $products
        ]);
    }
}
