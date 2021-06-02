@extends('layouts/fullLayoutMaster')

@section('title', 'Acceso')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
<div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Login v1 -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="javascript:void(0);" class="brand-logo">

          <img class="img-fluid brand-logo" src="{{'images/logo/hnosmachado.jpg'}}" alt="logo" />
        </a>

        <h4 class="card-title mb-1 text-center">{{ __('global.welcome') }}</h4>

        <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
          @csrf


          <div class="form-group">
            <label for="login-email" class="form-label">{{ __('global.email') }}</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" aria-describedby="login-email" tabindex="1" autofocus value="{{ old('email') }}" />
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="login-password">{{ __('global.password') }}</label>
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                <small>{{ __('global.forgot-password') }}</small>
              </a>
              @endif
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" aria-describedby="login-password" />
              <div class="input-group-append">
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="remember-me" name="remember-me" tabindex="3" {{ old('remember-me') ? 'checked' : '' }} />
              <label class="custom-control-label" for="remember-me"> {{ __('global.remember') }} </label>
            </div>
            <br>
            <div class="m-auto">
            {!! htmlFormSnippet([
                "theme" => "light",
                "size" => "normal",
                "tabindex" => "3",
                "callback" => "callbackFunction",
                "expired-callback" => "expiredCallbackFunction",
                "error-callback" => "errorCallbackFunction",
            ]) !!}
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" tabindex="4">{{ __('global.login') }}</button>
        </form>

        <p class="text-center mt-2">
          @if (Route::has('register'))
          <a href="{{ route('register') }}">
            <span>{{ __('global.register') }}</span>
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
    <!-- /Login v1 -->
  </div>
</div>

@endsection
