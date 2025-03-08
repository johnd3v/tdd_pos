<x-layouts.app title="Sales">
    <livewire:cart/>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
        @foreach($products as $product)
            <livewire:product-card 
                :name="$product->name" 
                :price="$product->price" 
                :image="$product->image"
                :type="$product->type"
                :shelf_code="$product->shelf_code"
                :renter="$product->renter"
                :id="$product->id"
            />
        @endforeach
    </div>

</x-layouts.app>
