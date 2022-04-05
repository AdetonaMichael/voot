
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection
@section('content')

    <div class="row   login_holder">

        <div class="col-md-12 d-flex justify-content-center">
            <div style="width:352px; box-shadow: 0 4px 12px rgb(0 0 0 / 15%); -webkit-box-shadow: 0 4px 12px rgb(0 0 0 / 15%); border-radius:8px;"  class="card pb-5">
                <div class=" login_header mt-5 text-center"><img src='{{ asset('img/voot_logo.png') }}' alt="voot logo" width="80" height="80"></div>

                <div class="card-body mt-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                            <div>
                                <input style="height:52px;  border-radius:4px; border:1px solid black;" id="email" placeholder="Email"  type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div >
                                <input style="height:52px; border-radius:4px; border:1px solid black;" id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-muted" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="text-center">
                                <button style="height:42px; border-radius:45px; width:100%; color:white; font:bold 12px tahoma; background-color:#a89714;" type="submit">
                                    {{ __('Login') }}
                                </button>
                                <br/>

                                @if (Route::has('password.request'))
                                    <a style="text-decoration:none;" class="btn btn-link text-muted" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <br/>
                                <span class="or_line">OR</span>

                                <br/>
                                <a class="mt-2" style="display:inline-grid" href="{{ route('register') }}">
                                    <span class="text-muted">Don't have an Account?</span>
                                    <i style="color:#a89714;" class="fa fa-arrow-circle-right fa-2x" aria-hidden="true"></i> <span class="ml-5 pl-5">SIGNUP HERE</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


@endsection
