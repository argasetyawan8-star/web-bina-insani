@extends('layouts.landing')

@section('title', 'Home')

@section('content')

    {{-- =========================================================
         HOME
    ========================================================== --}}

    {{-- HERO --}}
    @include('landing.sections.hero')


    {{-- ABOUT SINGKAT --}}
    @include('landing.sections.about')

    {{-- Gallery --}}

    @include('landing.sections.gallery')


    {{-- KEUNGGULAN SINGKAT --}}
    @include('landing.sections.why-us')


    {{-- ALUR PENDAFTARAN SINGKAT --}}
    @include('landing.sections.process')

    {{-- Sector --}}
     @include('landing.sections.sector')

    



@endsection