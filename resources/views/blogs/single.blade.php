@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex flex-wrap md:pt-8 pb-8">
        <div class="w-full lg:w-1/4">
            <img src="{{ asset('storage/' . $blog->featured_photo_path) }}" alt="{{ $blog->title }}" tabindex="0">
        </div>
        <div class="w-full lg:w-3/4 p-4 pt-0 px-6 leading-normal text-grey-darker text-content" tabindex="0">
            <h1 class="font-brand text-brand text-4xl">{{ $blog->title }}</h1>
            <p class="text-grey-darker mb-4">posted {!! $blog['created_at']->toFormattedDateString() !!}</p>
            {!! trans($blog->body) !!}
        </div>
    </div>
@endsection
