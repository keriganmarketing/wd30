@extends('layouts.dashboard')

@section('top')
<div class="container flex flex-wrap py-4 mx-auto justify-between">
    <welcome-card :data-user="user" :avatar-path='"{{ $avatarPath }}"'></welcome-card>
</div>
@endsection

@section('navigation')<!--make component-->
<div class="container mx-auto flex-items-center">
    <div class="flex w-full items-center justify-around mx-auto text-xl text-center lg:px-24">
        <a href="#" class="w-1/3 no-underline border-t-4 border-transparent hover:border-secondary text-white font-brand py-4 text-center text-2xl">
            Leads
        </a>
        <a href="#" class="w-1/3 no-underline border-t-4 border-transparent hover:border-secondary text-white font-brand py-4 text-center text-2xl">
            Properties
        </a>
        <a href="#" class="w-1/3 no-underline border-t-4 border-transparent hover:border-secondary text-white font-brand py-4 text-center text-2xl">
            Settings
        </a>
    </div>
</div>
@endsection

@section('content')
<leads></leads>
@endsection