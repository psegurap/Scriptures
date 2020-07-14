@extends('layouts.app')
@section('title')
    {{__('Change Password')}}
@endsection
@section('content')
<main class="form">
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <form class="text-left" method="POST" action="{{ route('change.password') }}">
                            @csrf
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="current_password" type="password" class=" @error('current_password') is-invalid @enderror" value="{{ old('current_password') }}" required placeholder="Current Password" autofocus>
                                    
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="new_password" name="new_password" type="password" class=" @error('new_password') is-invalid @enderror" value="{{ old('new_password') }}" required placeholder="New Password" autofocus>
                                    
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="new_confirm_password" name="new_confirm_password" type="password" class=" @error('new_confirm_password') is-invalid @enderror" value="{{ old('new_confirm_password') }}" required placeholder="Confirm New Password" autofocus>
                                    
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <a href="/admin/users/profile" class="btn btn-outline-info btn-sm rounded-0">Back to profile</a>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary rounded-0" value="">Change Password</button>
                                    </div>
                                </div>
                                @if(session()->has('message'))
                                    <div class="mt-3">
                                        <div class="rounded border border-success mb-0 p-2 text-center text-success" role="alert">
                                            <strong class="h6 font-weight-bold">{{ session()->get('message') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </form>                        
                        <p class="terms-conditions">Copyright © 2020 <a target="_blank" href="http://seguratesting.com">Pedro Segura</a>, All rights reserved.</p>

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
