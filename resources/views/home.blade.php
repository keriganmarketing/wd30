@extends('layouts.dashboard')

@section('top')
<div class="container flex flex-wrap py-4 mx-auto justify-between">
    <welcome-card :data-user="user" :avatar-path='"{{ $avatarPath }}"'></welcome-card>
</div>
@endsection

@section('content')
<div class="container mx-auto flex-items-center">
    <div class="flex w-full items-center justify-around mx-auto text-xl text-center lg:px-24 pb-8">
        <a
            href="#"
            class="w-1/3 no-underline border-t-4 border-transparent hover:border-secondary text-white font-brand py-4 text-center text-2xl"
            :class="{'border-secondary': selected == 'leads'}"
            @click="selected ='leads'"
        >
            Leads
        </a>
        <a
            href="#"
            class="w-1/3 no-underline border-t-4 border-transparent hover:border-secondary text-white font-brand py-4 text-center text-2xl"
            :class="{'border-secondary': selected == 'properties'}"
            @click="selected = 'properties'"
        >
            Properties
        </a>
        <a
            href="#"
            class="w-1/3 no-underline border-t-4 border-transparent hover:border-secondary text-white font-brand py-4 text-center text-2xl"
            :class="{'border-secondary': selected == 'settings'}"
            @click="selected = 'settings'"
        >
            Settings
        </a>
    </div>
    <leads v-if="selected == 'leads'"></leads>
    <bio-card :data-user="user" v-on:submit-button-clicked="sbc" v-if="selected == 'settings'"></bio-card>
</div>
@endsection