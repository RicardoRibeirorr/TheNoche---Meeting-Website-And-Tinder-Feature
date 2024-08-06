


@extends('layouts.blank')

@section('content')
<div class="h-100  bg-gradient h-100-vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="font-family-pacific text-white font-20px font-weight-light w-100 mt-6 mb-3">{{__("auth.login.title")}}</h1>
            </div>
            <div class="col-md-8">
                <p class="text-muted">{{__("auth.login.subtitle")}}</p> 
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- email --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="email" class="col-form-label text-white">{{__("auth.login.email")}}</label>
                            <input id="email" type="email"
                                class="form-control input-rounded @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-12">
                                <label for="password" class="col-form-label text-white">{{__("auth.login.password")}}</label>
                            <input id="password" type="password"
                                class="form-control input-rounded @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                            <div class="col-md-5 ">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-light" for="remember">
                                            {{__("auth.login.remember")}}
                                    </label>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="col-md-7 text-right text-muted">
                            <a class="text-muted py-0" href="{{ route('password.request') }}">
                                    {{__("auth.login.forgot_password")}}
                            </a>
                            </div>
                        @endif
                        </div>

                    <div class="form-group row mb-0">
                            
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-light btn-rounded">
                                    {{__("auth.login.submit")}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
