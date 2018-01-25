@extends('layouts.app')
@section('content')
        <ul>
        @foreach ($properties->data as $property)
            <li>{{ $property->price }}</li>
        @endforeach
        </ul>
@endsection