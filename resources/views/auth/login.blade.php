@extends('layouts.app')
@section('title')
    {{__('Sing In')}}
@endsection
@section('content')
<main class="form">
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <form method="POST" action="{{ route('login') }}" class="text-left">
                            @csrf
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus placeholder="{{__('Email')}}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" class="@error('password') is-invalid @enderror" type="password" class="form-control" required placeholder="{{__('Password')}}">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        {{--  --}}
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary rounded-0 btn-lg" value="">{{__('Log In')}}</button>
                                    </div>
                                </div>

                               

                                <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="new-control-input">
                                          <span class="new-control-indicator"></span>{{__('Keep me logged in')}}
                                        </label>
                                    </div>
                                </div>

                                {{-- <div class="field-wrapper">
                                    
                                    @if (Route::has('password.request'))
                                        <a href=" href="{{ route('password.request') }}" class="forgot-pass-link">Forgot Password?</a>
                                    @endif
                                </div> --}}

                            </div>
                        </form>                        
                        <p class="terms-conditions">Copyright © 2020 <a target="_blank" href="http://seguratesting.com">Pedro Segura</a>, {{__('All rights reserved')}}.</p>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>
</main>
@endsection
