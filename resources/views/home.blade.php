@extends('layouts.app')

@section('title', 'Somewhere in... - Explore Surabaya Beyond the Destination')

@section('content')

    @include('partials.navbar')

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
