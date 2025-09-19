@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('No podemos encontrar esa página.'))
@section('image-error')
    <img src="{{ asset('assets/media/auth/404-error.png') }}" class="mw-100 mh-300px theme-light-show" alt="" />
    <img src="{{ asset('assets/media/auth/404-error-dark.png') }}" class="mw-100 mh-300px theme-dark-show" alt="" />
@endsection
