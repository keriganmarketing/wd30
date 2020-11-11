@extends('layouts.app')
@section('content')
    <section class="flex hero lg:h-48 bg-brand-darker py-4 pt-32 bg-image-full" style="background-image: url('{{ $headerPhoto }}')">
        <div class="container mx-auto text-center md:text-left">
            <h1 class="text-white text-shadow">Accessibility Policy</h1>
        </div>
    </section>
    <section class="accessibility bg-white py-8 lg:py-16 xl:py-24">
        <div class="container mx-auto py-2">
            <div class="flex flex-wrap items-center">
                <div class="flex-auto w-full md:w-3/4 px-3 py-2 text-center md:text-left" tabindex="0">
                    <p class="leading-normal text-grey-darker mb-3">I am committed to making my website content accessible to all users so it meets or exceeds the requirements of Section 508 of the Rehabilitation Act of 1973 as well as the W3C’s Web Content Accessibility Guidelines (WCAG) 2.1 AA requirements.</p>
                    <p class="leading-normal text-grey-darker">If you have any comments or suggestions for improvement, please use the form below to contact me.</p>
                </div>
            </div>
        </div>
    </section>
    @include('partials.contact')
@endsection