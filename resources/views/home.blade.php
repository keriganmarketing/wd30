@extends('layouts.dashboard')

@section('content')
<div class="container flex mx-auto">
    <bio-card :data-user="user" v-on:submit-button-clicked="sbc"></bio-card>
    <welcome-card :data-user="user"></welcome-card>
</div>
<div class="container border mx-auto">
    <h1 class="text-xl font-semibold text-center py-8 border-b">
    Leads
    </h1>
    @foreach($leads as $lead)
        <p class="border-b pl-4 py-4">{{ $lead->name }}</p>
    @endforeach
</div>
@endsection
