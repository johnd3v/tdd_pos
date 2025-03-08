<div class="view-cart-container">
    <div class="fixed bottom-4 right-4 z-50">
        <flux:modal.trigger name="view-cart">
            <flux:button >    
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                    <circle cx="8" cy="21" r="1"></circle>
                    <circle cx="19" cy="21" r="1"></circle>
                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                </svg>
            View Cart ({{ $cartCount }})
            </flux:button>
        </flux:modal.trigger>
    </div>
    <flux:modal name="view-cart" variant="flyout" style="background-color:var(--color-gray-900) !important;">
        <div class="bg-gray-900 w-full max-w-md flex flex-col h-full shadow-xl">
          <!-- Cart Header -->
          <div class="flex justify-between items-center p-4 border-b border-gray-700">
            <h2 class="text-xl font-bold text-white">Shopping Cart</h2>
          </div>

          @if(empty($cartItems))
            <p class="text-gray-400">Your cart is empty.</p>
          @else
             <!-- Cart Items -->
             <div class="flex-1 overflow-y-auto p-4 space-y-4">
                <!-- Start Loop Cart Item -->
                @foreach ($cartItems as $index => $item )
                    <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 flex items-center">
                        <div class="w-16 h-16 bg-gray-700 rounded-md overflow-hidden">
                            <img src="{{ asset('storage/' . $item['image']) }}" class="w-full h-full object-cover">
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="font-medium text-white">{{ $item['name'] }}</h3>
                            <p class="text-sm text-gray-400">₱{{ $item['price'] }} each</p>
                        </div>
                        <div class="flex items-center">
                            <button wire:click="updateCartQuantity({{ $index }}, -1)"  class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center hover:bg-gray-600 transition">
                            <i class="fas fa-minus text-gray-400 text-xs"></i>
                            </button>
                            <span class="mx-2 w-6 text-center text-white">{{ $item['quantity'] }}</span>
                            <button wire:click="updateCartQuantity({{ $index }}, 1)"  class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center hover:bg-gray-600 transition">
                            <i class="fas fa-plus text-gray-400 text-xs"></i>
                            </button>
                        </div>
                        <div class="ml-4 font-semibold text-white">₱{{ number_format($item['price'], 2) }}</div>
                    </div>
                @endforeach
              </div>
          
              <!-- Cart Summary -->
              <div class="border-t border-gray-700 p-4 bg-gray-900">
                <div class="flex justify-between items-center mb-4 text-lg">
                  <span class="font-bold text-white">Total</span>
                  <span class="font-bold text-blue-500">₱{{ number_format(collect($cartItems)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}</span>
                </div>
                <flux:modal.close>
                    <button  wire:click="checkout" class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-bold transition">
                    Checkout
                    </button>
                </flux:modal.close>
              </div>
          @endif  
        </div>
      </flux:modal>
      
</div>
