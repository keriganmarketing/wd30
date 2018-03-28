@extends('layouts.app')
@section('content')
    <property-search
        :initial-search-terms="{{ $searchParams }}"
        :initial-search-results="{{ $properties }}"
        :google-key="'{{ config('google.api_key') }}'"
        :data-map-module="'{{ config('modules.map_search') }}'"
    >
    </property-search>
    <div class="container mx-auto">
        @include('partials.disclaimer')
    </div>
    @include('partials.contact')
@endsection