@extends('layouts/fullLayoutMaster')

@section('title', 'Error 404')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/pages/error.css')) }}">
@endsection
@section('content')
    <!-- error 404 -->
    <section class="row flexbox-container">
        <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
            <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                <div class="card-content">
                    <div class="card-body text-center">
                        @if (config('brand.logo'))
                            <img src="{{ config('brand.logo') }}" class="img-fluid align-self-center w-50" alt="branding logo">
                        @else
                            <h1 class="font-large-1">{{ config('app.name') }}</h1>
                        @endif
                        <h1 class="font-large-1 my-1">{{$code}} - {{$message}}</h1>
                        <a class="btn btn-primary btn-lg mt-2" href="{{ url()->previous() }}">{{ __('errors.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- error 404 end -->
@endsection

