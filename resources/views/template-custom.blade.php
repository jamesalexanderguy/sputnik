{{--
  Template Name: Custom Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')
    @include('partials.banner')
    @include('partials.recommendations')
    @include('partials.websites')
    @include('partials.features')
    
    @include('partials.portfolio')

    {{-- # @include('partials.cta')
    @include('partials.testimonials') --}}

    @include('partials.contact')
    
  @endwhile
@endsection
