<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; 
use App\Models\Product;
class AddProductModal extends Component
{
    use WithFileUploads;

    public $name,$type,$shelf_code,$renter,$price,$image;

    protected $rules = [
        'name' => 'required|string',
        'type' => 'required|string',
        'shelf_code' => 'required|string',
        'renter' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048'
    ];

    public function saveProduct() : void
    {
        $this->validate();
        
        $imagePath = null;
        if($this->image){
            $imagePath = $this->image->store('product','public');
        }

        Product::create([
            'name' => $this->name,
            'type' => $this->type,
            'shelf_code' => $this->shelf_code,
            'renter' => $this->renter,
            'price' => $this->price,
            'image' => $imagePath
        ]);

        $this->dispatch('showToast', type: 'success', title: 'Product Added', message: 'The product has been successfully created!');

        // Reset the form
        $this->reset(['name', 'type', 'shelf_code', 'renter', 'price']);
        $this->dispatch('refreshDatatable');
        $this->dispatch('closeModal');

    }

    public function render()
    {
        return view('livewire.add-product-modal');
    }
}
