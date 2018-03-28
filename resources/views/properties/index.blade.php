@extends('layouts.app')
@section('content')
    <property-search
        :initial-search-terms="{{ $searchParams }}"
        :initial-search-results="{{ $properties }}"
    >
    </property-search>
    <div class="container mx-auto">
        @include('partials.disclaimer')
    </div>
    @include('partials.contact')
@endsection