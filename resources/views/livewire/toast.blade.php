<div 
    x-data="{ show: @entangle('visible').defer }" 
    x-show="show"
    x-transition
    class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow-sm right-5 bottom-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800 z-50" 
    role="alert"
    x-init="
        Livewire.on('showToast', () => { 
            show = true; 
            setTimeout(() => show = false, 3000); 
        })"
>
    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 {{$iconColor}}">
        {!! $icon !!}
        <span class="sr-only">{{ $title }}</span>
    </div>
    <div class="ms-3 text-sm font-normal border-r-0">{{ $message }}</div>
    <button 
        type="button" 
        @click="show = false"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
        aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
