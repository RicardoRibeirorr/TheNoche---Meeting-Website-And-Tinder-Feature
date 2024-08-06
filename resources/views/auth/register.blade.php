@extends('layouts.blank')

@section('content')
<div class="h-100  bg-gradient h-100-vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="font-family-pacific text-white font-20px font-weight-light w-100 mt-6 mb-3">{{__("auth.register.title")}}</h1>
            </div>
            <div class="col-md-8">
                <p class="text-muted">{{__("auth.register.subtitle")}}</p>
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="country_id" id="country_id" value="1">
                    {{-- Name and age --}}
                    <div class="form-group row"> 
                        <div class="col-12">
                            <label for="name" class="col-form-label text-white">{{__("auth.register.name")}}</label>
                            <input id="name" type="text"
                                class="form-control input-rounded @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    {{-- email --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="email" class="col-form-label text-white">{{__("auth.register.email")}}</label>
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


                    {{-- selects --}}
                    <div class="form-group row text-center justify-content-center">
                        <div class="col-12 col-sm-6">
                            <label for="location_id" class="col-form-label text-white">{{__("auth.register.location")}}</label>
                            <select class="form-control input-rounded w-100 @error('location_id') is-invalid @enderror"
                                name="location_id" value="{{ old('location_id') }}" required autocomplete="location_id">
                                @foreach ($locations as $location)
                                    <option value="{{$location->id}}" @if( old('location') ==  $location->id) selected @endif>{{$location->name}}</option>
                                @endforeach
                            </select>
                            @error('location_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="age" class="col-form-label text-white">{{__("auth.register.age")}}</label>
                            <input id="age" type="number" min="18" value="18" max="120"
                                class="form-control input-rounded @error('age') is-invalid @enderror" name="age"
                                value="{{ old('age') ?? 18 }}" required autocomplete="age">

                            @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                                <label for="password" class="col-form-label text-white">{{__("auth.register.password")}}</label>
                            <input id="password" type="password"
                                class="form-control input-rounded @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12 text-center text-light-1">
                                <hr class="hr-light">
                                <input id="terms" type="checkbox"
                                class="mr-1 @error('terms') is-invalid @enderror" name="terms" required >{{__("auth.register.terms.content")}}<a href="/terms/term" target="_blank" class="text-white">{{__("auth.register.terms.use")}}</a> & <a href="/terms/privacy" target="_blank" class="text-white">{{__("auth.register.terms.privacy")}}</a>.
                                @error('terms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-light btn-rounded">
                                    {{ __('auth.register.submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
