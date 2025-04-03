@extends('template.base')

@section('content')
<div class=" px-4 my-8">
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <img src="{{ asset('storage/' . $promotion->image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:scale-50" alt="...">
    </div>

    {{-- title --}}
    <h5 class="mt-4 mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">{{$promotion->title}}</h5>
    
    {{-- description --}}
    <p class="text-2xl text-gray-800">{{$promotion->description}}</p>

    {{-- date --}}
    <br>
    <p class="text-lg text-gray-800"><span>Updated at: </span> {{$promotion->updated_at}}</p>
</div>
@endsection