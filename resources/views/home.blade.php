@extends('layouts.contentLayoutMaster')

@section('title', __('global.home'))

@section('vendor-style')

@endsection

@section('page-style')

@endsection

@section('content')
    @include('includes.notifications')
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body text-center">
                    <img src="{{asset('images/logo/hnosmachado.jpg')}}" alt="" width="120px" />
                    <h1>{{__('global.main_welcome')}}</h1>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')

@endsection
@section('page-script')

@endsection
