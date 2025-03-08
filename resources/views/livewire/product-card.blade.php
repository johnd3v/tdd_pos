<div class="product-card w-full max-w-sm overflow-hidden transition-all duration-300 rounded-lg bg-[#1e2a3b] text-slate-200 hover:shadow-lg hover:shadow-blue-500/20">
  <!-- Card Header with Image -->
  <div class="relative h-48 w-full overflow-hidden">
    <div class="absolute inset-0 w-full h-full transition-transform duration-500 product-image">
      <img 
        src="{{ asset('storage/' . $image) }}" 
        alt="10x Whitening" 
        class="absolute inset-0 w-full h-full object-cover"
      >
    </div>
    
    <!-- Badges -->
    <div class="absolute top-2 right-2 flex flex-col gap-2">
      <span class="inline-flex bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded-full">
        New
      </span>
    </div>
    
    <!-- Price Tag -->
    <div class="absolute bottom-0 left-0 bg-blue-500/90 px-3 py-1 font-bold">
      ₱{{$price}}
    </div>
  </div>

  <!-- Card Content -->
  <div class="grid gap-3 p-4">
    <div class="flex justify-between items-start">
      <h3 class="line-clamp-1 text-lg font-semibold text-slate-100">{{ $name }}</h3>
    </div>
    
    <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-xs text-slate-300">
      <div class="flex items-center justify-between">
        <span class="text-slate-400">Shelf Code:</span>
        <span>{{ $shelf_code }}</span>
      </div>
      <div class="flex items-center justify-between">
        <span class="text-slate-400">Shelf Renter:</span>
        <span class="truncate max-w-[80px]">{{ $renter }}</span>
      </div>
      <div class="col-span-2 flex items-center justify-between">
        <span class="text-slate-400">Product Type:</span>
        <span>{{ $type }}</span>
      </div>
    </div>
  </div>

  <!-- Card Footer -->
  <div class="p-4 pt-0">
    <button wire:click="addToCart" class="w-full flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-medium transition-colors py-2 px-4 rounded-md">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
        <circle cx="8" cy="21" r="1"></circle>
        <circle cx="19" cy="21" r="1"></circle>
        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
      </svg>
      Add to Cart
    </button>
  </div>
</div>
