@extends('layouts.dashboard')

@section('top')
<div class="container flex flex-wrap py-4 mx-auto justify-between">
    <welcome-card
        :boilerplate="boilerplate"
        :data-user="user"
        :avatar-path='"{{ $avatarPath }}"'
        :active-leads-count="activeLeadsCount"
    >
    </welcome-card>
</div>
@endsection

@section('content')
<div class="container mx-auto min-h-screen px-2">
    <div class="flex w-full items-center justify-around mx-auto text-xl text-center lg:px-24 pb-8 mb-4">
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
    <leads v-if="selected == 'leads'" v-on:update-leads-count="updateLeadsCount"></leads>
    <my-properties v-if="selected == 'properties'" :user="user"></my-properties>
    <bio-card :data-user="user" v-on:submit-button-clicked="sbc" v-if="selected == 'settings'"></bio-card>
    <content-card :data-content="content" v-if="selected == 'settings'" v-on:content-edited="updateContent"></content-card>
    <seo-card v-if="selected == 'settings'"></seo-card>
</div>
@endsection

@section('help')
    <button class="px-4 py-4 relative pin-b pin-r z-50 text-brand-darkest">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle fixed pin-b pin-r p-4"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12" y2="17"></line></svg>
    </button>
@endsection