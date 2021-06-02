@extends('layouts/fullLayoutMaster')

@section('title', 'Reset Password')

@section('page-style')
{{-- Page Css files --}}
{{-- <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}"> --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Reset Password v1 -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="javascript:void(0);" class="brand-logo">
          <img class="img-fluid brand-logo" src="{{'images/logo/hnosmachado.jpg'}}" alt="logo" />
        </a>

        <h4 class="card-title mb-1">{{ __('auth-passwords-reset.reset-password') }}</h4>
        <p class="card-text mb-2">{{ __('auth-passwords-reset.instructions') }}</p>

        <form class="auth-reset-password-form mt-2" method="POST" action="{{ route('password.update') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-group">
            <label for="email" class="form-label">{{ __('global.email') }}</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" tabindex="1" autofocus value="{{ $email ?? old('email') }}" />
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="reset-password-new">{{ __('global.password') }}</label>
            </div>
            <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
              <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="reset-password-new" name="password" aria-describedby="reset-password-new" tabindex="2" autofocus />
              <div class="input-group-append">
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="reset-password-confirm">{{ __('global.password-confirm') }}</label>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input type="password" class="form-control form-control-merge" id="reset-password-confirm" name="password_confirmation" autocomplete="new-password" aria-describedby="reset-password-confirm" tabindex="3" />
              <div class="input-group-append">
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" tabindex="4">{{ __('global.reset') }}</button>
        </form>

        <p class="text-center mt-2">
          @if (Route::has('login'))
          <a href="{{ route('login') }}">
            <i data-feather="chevron-left"></i> {{ __('global.back') }}
          </a>
          @endif
        </p>
      </div>
    </div>
    <!-- /Reset Password v1 -->
  </div>
</div>
@endsection

@section('vendor-script')
{{-- <script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script> --}}
@endsection

@section('page-script')
{{-- <script src="{{asset(mix('js/scripts/pages/page-auth-reset-password.js'))}}"></script> --}}
@endsection
