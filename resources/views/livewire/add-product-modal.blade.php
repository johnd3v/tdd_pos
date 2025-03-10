<div>
    <!-- Show Success Message -->
    {{-- @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-3">
            {{ session('message') }}
        </div>
    @endif --}}

    <flux:modal.trigger name="add-product-modal">
        <flux:button>Add Product</flux:button>
    </flux:modal.trigger>

    <flux:modal name="add-product-modal" class="md:w-96" wire:ignore.self>
        <form wire:submit.prevent="saveProduct" enctype="multipart/form-data">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Add New Product</flux:heading>
                </div>

                <flux:input label="Product Name" placeholder="Product Name" wire:model="name" />
                <flux:input label="Product Type" placeholder="Product Type" wire:model="type" />
                <flux:input label="Shelf Code" placeholder="Shelf Code" wire:model="shelf_code"/>
                <flux:input label="Renter" placeholder="Renter" wire:model="renter"/>
                <flux:input label="Price" placeholder="Price" type="number" wire:model="price"/>
                <flux:input label="Product Image" type="file" wire:model="image"/>

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Save Product</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>





    <script>
        window.addEventListener("load", function () {
            if (window.Livewire) {
                window.Livewire.on("closeModal", () => {
                    Flux.modals().close()
                });
            } else {
                console.error("Livewire is not available.");
            }
        });
    </script>
    
    
</div>

