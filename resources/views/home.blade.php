@extends('layouts.dashboard')

@section('content')
<div class="container flex flex-wrap mx-auto mb-8 justify-between">
    <div class="w-full flex justify-around h-full">
        <div class="w-full md:w-1/3 bg-white">
            <avatar-upload :avatar-path='"{{ $avatarPath }}"'></avatar-upload>
        </div>
        <div class="w-full md:w-2/3">
            <bio-card :data-user="user" v-on:submit-button-clicked="sbc"></bio-card>
        </div>
    </div>
    <div class="w-full h-full">
        <welcome-card :data-user="user"></welcome-card>
    </div>
</div>
<leads></leads>
@endsection
