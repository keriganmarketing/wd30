@extends('layouts.app')
@section('content')
    <property-search></property-search>
    <div class="container mx-auto">
        @include('partials.disclaimer')
    </div>
    @include('partials.contact')
@endsection