@extends('layouts.app')

@section('title', 'Surabaya Wanderlust - Somwhere in Surabaya')

@section('content')

    @include('partials.navbar')
    @include('partials.dev-flyer')

    @include('partials.hero')

    @include('partials.featured-slider')

    @include('partials.recommendation')

    @include('partials.region-slider')

    @include('partials.features')

    @include('partials.footer')

@endsection

@push('scripts')
    @include('partials.scripts')
@endpush
