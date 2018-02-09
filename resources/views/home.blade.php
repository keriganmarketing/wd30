@extends('layouts.dashboard')

@section('top')
<div class="container flex flex-wrap py-4 mx-auto justify-between">
    <welcome-card :data-user="user" :avatar-path='"{{ $avatarPath }}"'></welcome-card>
</div>
@endsection

@section('navigation')<!--make component-->
<div class="container mx-auto flex-items-center">
    <div class="inline-flex w-full items-center justify-around mx-auto text-xl text-center">
        <a href="#">
        <button class="border-t-4 border-transparent hover:border-dbblue-darkest text-smoke-dark hover:text-smoke-darkest font-hairline py-4 px-8">
            Leads
        </button>
        </a>
        <a href="#">
        <button class="border-t-4 border-transparent hover:border-dbblue-darkest text-smoke-dark hover:text-smoke-darkest font-hairline py-4 px-8">
            Properties
        </button>
        <a href="#">
        <button class="border-t-4 border-transparent hover:border-dbblue-darkest text-smoke-dark hover:text-smoke-darkest font-hairline py-4 px-8">
            Settings
        </button>
        </a>
    </div>
</div>
@endsection

@section('content')
<leads></leads>
@endsection