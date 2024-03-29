@extends('layouts.contentLayoutMaster')

@section('title', __('global.create_version'))

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">

@endsection

@section('page-style')
    {{-- Page Css files --}}

@endsection

@section('content')
    @include('includes.notifications')
    <section class="version-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    @include('version.create-edit-form', ['action' => route('version.store', $document)])
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <!-- vendor files -->

    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>

    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>

    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    @if (app()->getLocale() !== 'en')
        <script src="{{ asset(mix('assets/js/template/pickadate/translations/'.app()->getLocale().'.js')) }}"></script>
        <script src="{{ asset(mix('assets/js/template/validation/messages_'.app()->getLocale().'.js')) }}"></script>
    @endif

@endsection

@section('page-script')
    <!-- Page js files -->
    <script>

        let validation = {};
        let messages = {};

        $('#create-version').validate({
            lang: '{{app()->getLocale()}}',
            rules: validation,
            messages: messages
        });

    </script>
@endsection