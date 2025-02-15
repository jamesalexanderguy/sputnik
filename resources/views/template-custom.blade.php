{{--
  Template Name: Custom Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.banner')
    @include('partials.cta')
    @include('partials.content-page')
    @include('partials.contenttest')
  @endwhile
@endsection
