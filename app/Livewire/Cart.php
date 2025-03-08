<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sale;
class Cart extends Component
{
    public $cartItems = [];
    public $cartCount = 0;

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->cartItems = session()->get('cart', []);
        $this->cartCount = count($this->cartItems);
    }

    public function updateCartQuantity($key, $change)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $change;

            if ($cart[$key]['quantity'] <= 0) {
                unset($cart[$key]);
            }

            session()->put('cart', $cart);
            $this->updateCart();
        }
    }

    public function clearCart()
    {
        session()->forget('cart');
        $this->cartItems = [];
        $this->cartCount = 0;
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function checkout(){
        if(!empty($this->cartItems)){
            foreach($this->cartItems as $item){
                 Sale::create([
                    'product_name' => $item['name'],
                    'shelf_code' => $item['shelf_code'],
                    'renter' => $item['renter'],
                    'price'=> $item['price'],
                    'quantity' => $item['quantity']
                 ]);  
            }
            $this->clearCart();
        }
    }

}
