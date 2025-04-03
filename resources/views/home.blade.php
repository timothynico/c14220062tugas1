@extends('template.base')

@section('content')
<div id="default-carousel" class="relative w-full pb-8 " data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
         @foreach ($promotions as $promotion)
         <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('storage/' . $promotion->image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:scale-50" alt="...">
        </div>
         @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-10 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach ($promotions as $index => $promotion)
        <button type="button" class="w-3 h-3 rounded-full  'bg-gray-300' aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 lg:bg-gray-800/30 group-hover:bg-white/50 lg:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white lg:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white lg:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 lg:bg-gray-800/30 group-hover:bg-white/50 lg:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white lg:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white lg:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<div class="py-2 px-4 mx-16">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">List Promotion</h5>
</div>
{{-- Card promotions --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-4 place-items-center">
    @foreach ($promotions as $promotion)
    <div class="max-w-sm min-h-[100px] md:min-h-[360px] bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <a href="{{ route('detail', ['id' => $promotion->id]) }}">
            <div class="h-40 overflow-hidden">
                <img src="{{ asset('storage/' . $promotion->image) }}" alt="Promotion Image">
            </div>
        </a>
        <div class="p-5">
            <a href="{{ route('detail', ['id' => $promotion->id]) }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$promotion->title}}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ strlen($promotion->description) > 30 ? substr($promotion->description, 0, 30) . '...' : $promotion->description }}</p>
            <a href="{{ route('detail', ['id' => $promotion->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Detail
            </a>
        </div>
    </div>
    @endforeach  
</div>



@endsection