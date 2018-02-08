@extends('layouts.dashboard')

@section('content')
<div class="container flex flex-wrap bg-tan-lightest mx-auto mb-8 justify-between">
    <welcome-card :data-user="user" :avatar-path='"{{ $avatarPath }}"'></welcome-card>
</div>
<leads></leads>
@endsection