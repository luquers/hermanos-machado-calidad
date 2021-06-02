@extends('layouts.contentLayoutMaster')

@section('title', __('users-edit.edit-user'))

@section('vendor-style')

@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <!-- Dropify CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
@endsection

@section('content')
    @include('includes.notifications')
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    @include('project.users.form-create-edit', ['action' => route('user.update', ['user' => $user]), 'user' => $user])
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    @if (app()->getLocale() !== 'en')
        <script src="{{ asset(mix('assets/js/template/validation/messages_'.app()->getLocale().'.js')) }}"></script>
    @endif

    <script src="{{ asset(mix('assets/js/template/validation/validator-config-methods.js')) }}"></script>
    <script src="{{ asset(mix('assets/js/template/validation/validator-render-errors.js')) }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('assets/js/project/users/edit.js')) }}"></script>
    <!-- Dropify JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#image").dropify({
                messages: {
                    'default': '{{__('global.dropify_default')}}',
                    'replace': '{{__('global.dropify_replace')}}',
                    'remove': '{{__('global.dropify_remove')}}',
                    'error': '{{__('global.dropify_error')}}'
                }
            });
            let drEvent = $("#image").dropify();
            drEvent.on('dropify.beforeClear', function(event, element){
                $('#avatar-status').val("0");
            });
        });
    </script>
@endsection



