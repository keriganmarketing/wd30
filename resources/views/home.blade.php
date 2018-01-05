@extends('layouts.dashboard')

@section('content')
<div class="container flex mx-auto">
    <bio-card :data-user="user" v-on:submit-button-clicked="sbc"></bio-card>
</div>
@endsection
