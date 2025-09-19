@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('image-error')
    <img src="{{ asset('assets/media/auth/403-error.png') }}" class="mw-100 mh-300px theme-light-show" alt="" />
@endsection
