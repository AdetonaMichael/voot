
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection
@section('content')

    <div class="row justify-content-center mt-5">
        <div style="width:352px; box-shadow: 0 4px 12px rgb(0 0 0 / 15%); -webkit-box-shadow: 0 4px 12px rgb(0 0 0 / 15%); border-radius:8px; card" >
            <div class=" login_header mt-5 text-center"><img src='{{ asset('img/voot_logo.png') }}' alt="voot logo" width="80" height="80"></div>
              <div class="card-body mt-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div  class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

                            <div>
                                <input id="name" style="height:52px;  border-radius:4px; border:1px solid black;" placeholder="{{ __('Name') }}" type="text" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                            <div>
                                <input id="email" style="height:52px;  border-radius:4px; border:1px solid black;" placeholder="{{ __('E-Mail Address') }}" type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div>
                                <input id="password" style="height:52px;  border-radius:4px; border:1px solid black;" placeholder="{{ __('Password') }}" type="password" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                            <div>
                                <input style="height:52px;  border-radius:4px; border:1px solid black;" id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-control mb-4" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 text-center">
                            <div>
                                <button  style="height:42px; border-radius:45px; width:100%; color:white; font:bold 12px tahoma;background-color:#a89714;" type="submit">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <span class="or_line">OR</span>

                            <a style="display:inline-grid" class="mt-2" href="{{ route('login') }}">
                                <span>Already have an account?</span>
                                 <i style="color:#a89714;" class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i> <span class="ml-5 pl-5 "> Login Here</span>
                            </a>
                        </div>
                    </form>
                </div>


    </div>

@endsection

