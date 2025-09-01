@extends('layouts.app')

@section('content')
    <section class="ftco-section d-flex align-content-center align-items-center"
             style="background-image: url('{{asset('assets/media/bg/6012130.jpg')}}'); height: 100vh">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4"> {{__('validation.auth.login')}}</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                           class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-google"></span></a>
                                        <a href="#"
                                           class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form method="post" action="{{ route('login') }}" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name"> {{__('validation.auth.phone')}}</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                           name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                           autofocus placeholder=" {{__('validation.auth.phone')}}">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">{{__('validation.auth.password')}}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" autocomplete="current-password"
                                           placeholder="{{__('validation.auth.password')}} " required>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="form-check">
                                        <input class="form-check-input checkbox-primary" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label mx-4" for="remember">
                                            {{__('validation.auth.remember_me')}}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">  {{__('validation.auth.login')}}</button>
                                </div>
                            </form>
                        </div>
                        <div class="img"
                             style="background-image: url({{asset('assets/media/bg/2.webp')}}); object-fit: fill">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    {{--    <div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">{{ __('Login') }}</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    <form method="POST" action="{{ route('login') }}">--}}
    {{--                        @csrf--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

    {{--                                @error('email')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

    {{--                                @error('password')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <div class="col-md-6 offset-md-4">--}}
    {{--                                <div class="form-check">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

    {{--                                    <label class="form-check-label" for="remember">--}}
    {{--                                        {{ __('Remember Me') }}--}}
    {{--                                    </label>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-0">--}}
    {{--                            <div class="col-md-8 offset-md-4">--}}
    {{--                                <button type="submit" class="btn btn-primary">--}}
    {{--                                    {{ __('Login') }}--}}
    {{--                                </button>--}}

    {{--                                @if (Route::has('password.request'))--}}
    {{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
    {{--                                        {{ __('Forgot Your Password?') }}--}}
    {{--                                    </a>--}}
    {{--                                @endif--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
@endsection
