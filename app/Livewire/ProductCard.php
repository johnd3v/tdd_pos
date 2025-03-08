<?php

namespace App\Livewire;

use Livewire\Component;

class ProductCard extends Component
{
    public $name;
    public $price;
    public $image;
    public $type;
    public $shelf_code;
    public $renter;
    public $id;

    public function mount($id, $name, $price, $image, $type, $shelf_code, $renter)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->type = $type;
        $this->shelf_code = $shelf_code;
        $this->renter = $renter;
    }

    public function addToCart()
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$this->id])) {
            $cart[$this->id]['quantity']++;
        } else {
            $cart[$this->id] = [
                'name' => $this->name,
                'price' => $this->price,
                'quantity' => 1,
                'image' => $this->image,
                'renter' => $this->renter,
                'shelf_code' => $this->shelf_code
            ];
        }

        session()->put('cart', $cart);

        // Ensure Livewire updates the cart
        $this->dispatch('cartUpdated', count($cart));
        $this->dispatch('cartAdded', ['id' => $this->id, 'name' => $this->name]); // Optional success message
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
