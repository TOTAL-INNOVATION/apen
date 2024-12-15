@extends('layouts.base')

@section('metadata')
    <title>{{ $title }} | {{ config('app.name') }}</title>
    {{ $metadata }}
@endsection

@section('content')
    <x-header />
    {{ $slot }}
    <x-footer />
@endsection
