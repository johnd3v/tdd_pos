<div class="p-4">
    <input type="text"  
    wire:model.live.debounce.500ms="search"
    placeholder="Search products..." name="search" class="w-full p-2 border border-gray-300 rounded-lg mb-4">

    <!-- Product Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mt-4">
        @foreach($products as $product)
            @livewire('product-card', [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'type' => $product->type,
                'shelf_code' => $product->shelf_code,
                'renter' => $product->renter
            ], key($product->id))
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $products->links() }}
    </div>
    
</div>
