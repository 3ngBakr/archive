@extends('back-end.layouts.auth')

@section('title', __('Sign In'))

@section('content')
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="{{ asset('assets/images/logo-img.png') }}" width="180" alt=""/>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="form-body">
                                    <form method="POST" action="{{ route('login') }}" class="row g-3">
                                        @csrf
                                        <div class="col-12 has-validation">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input type="email"
                                                   id="email"
                                                   name="email"
                                                   value="{{ old('email') }}"
                                                   class="form-control {{ $errors->any() ? 'is-invalid' : '' }}"
                                                   placeholder="{{ __('Email') }}"
                                                   required autofocus aria-describedby="loginError">
                                            @if ($errors->any())
                                                <div id="loginError" class="invalid-feedback">
                                                    {{ $errors->first() }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password"
                                                       id="password"
                                                       name="password"
                                                       class="form-control border-end-0"
                                                       placeholder="{{ __('Password') }}"
                                                       required autocomplete="current-password">
                                                <a href="#" class="input-group-text bg-transparent">
                                                    <i class='bx bx-hide'></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <label class="form-check-label"
                                                       for="remember_me">{{ __('Remember me') }}</label>
                                                <input id="remember_me"
                                                       name="remember"
                                                       type="checkbox"
                                                       class="form-check-input">
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bx bxs-lock-open"></i>{{ __('Log in') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection