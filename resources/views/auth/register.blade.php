@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Register v1 -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="javascript:void(0);" class="brand-logo">
          <img class="img-fluid brand-logo" src="{{'images/logo/hnosmachado.jpg'}}" alt="logo" />
        </a>

        <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <label for="register-name" class="form-label">{{ __('global.name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="register-name" name="name" aria-describedby="register-name" tabindex="1" autofocus value="{{ old('name') }}" />
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="register-email" class="form-label">{{ __('global.email') }}</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="register-email" name="email" aria-describedby="register-email" tabindex="2" value="{{ old('email') }}" />
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="register-password" class="form-label">{{ __('global.password') }}</label>

            <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
              <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="register-password" name="password" aria-describedby="register-password" tabindex="3" />
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
            <label for="register-password-confirm" class="form-label">{{ __('global.password-confirm') }}</label>

            <div class="input-group input-group-merge form-password-toggle">
              <input type="password" class="form-control form-control-merge" id="register-password-confirm" name="password_confirmation" aria-describedby="register-password" tabindex="3" />
              <div class="input-group-append">
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="register-privacy-policy" tabindex="4" />
              <label class="custom-control-label" for="register-privacy-policy">
                {{ __('auth-register.accept-terms') }}
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" tabindex="5">{{ __('global.register') }}</button>
        </form>

        <p class="text-center mt-2">
          @if (Route::has('login'))
          <a href="{{ route('login') }}">
            <span>{{ __('global.login') }}</span>
          </a>
          @endif
        </p>

{{--        <div class="divider my-2">--}}
{{--          <div class="divider-text">or</div>--}}
{{--        </div>--}}

{{--        <div class="auth-footer-btn d-flex justify-content-center">--}}
{{--          <a href="javascript:void(0)" class="btn btn-facebook">--}}
{{--            <i data-feather="facebook"></i>--}}
{{--          </a>--}}
{{--          <a href="javascript:void(0)" class="btn btn-twitter white">--}}
{{--            <i data-feather="twitter"></i>--}}
{{--          </a>--}}
{{--          <a href="javascript:void(0)" class="btn btn-google">--}}
{{--            <i data-feather="mail"></i>--}}
{{--          </a>--}}
{{--          <a href="javascript:void(0)" class="btn btn-github">--}}
{{--            <i data-feather="github"></i>--}}
{{--          </a>--}}
{{--        </div>--}}
      </div>
    </div>
    <!-- /Register v1 -->
  </div>
</div>
@endsection
