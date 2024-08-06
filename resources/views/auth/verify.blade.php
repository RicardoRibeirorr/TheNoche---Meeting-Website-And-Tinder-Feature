@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.verify_email.title') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.verify_email.resent') }}
                        </div>
                    @endif 

                    {{ __('auth.verify_email.description') }} <a href="{{ route('verification.resend') }}">{{ __('auth.verify_email.link_resent') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
