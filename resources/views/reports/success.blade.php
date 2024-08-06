@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('report.report.report_sent') }}</div>

                <div class="card-body">
                        <div class="alert alert-success" role="alert">
                                {{ __('report.help.congrats_note') }}
                        </div>

                        {{ __('report.help.congrats') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
