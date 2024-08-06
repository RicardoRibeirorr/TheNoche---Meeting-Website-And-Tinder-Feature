@extends('layouts.app')

@section('content')
<div class="container text-center">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('report.report.report_' . $type) }}</div>
    
                    <div class="card-body">
                            <p>{{__("report.help.explain")}}</p>
                            

                    
                    <form method="POST" action="/report/{{$type}}/{{$data->id}}">
                            @csrf
                    <input type="hidden" name="type" id="type" value="{{$type}}">
                            <div class="form-group row">
                                    
                                <label for="title" class="col-12 col-form-label text-center">{{__("report.title")}}</label>
    
                                <div class="col-12">
                                    <input id="title" type="text" max="100" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title-report" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                    
                                <label for="description" class="col-12 col-form-label text-center">{{__("report.description")}}</label>
                                <div class="col-12">
                                    <textarea id="description" max="255" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description-report" autofocus> {{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label title="Content is illegal, sexually explicit or shocking" for="illegal" class="col-6 col-form-label text-center">{{__("report.illegal")}}</label>
                                <label title="Would you " for="important" class="col-6 col-form-label text-center">{{__("report.important")}}</label>
                                <div class="col-6">
                                    <input id="illegal" type="checkbox" class="@error('illegal') is-invalid @enderror" name="illegal" autocomplete="illegal-report" autofocus> 
                                </div>
                                <div class="col-6">
                                    <input id="important" type="checkbox" class="@error('important') is-invalid @enderror" name="important" autocomplete="important-report" autofocus> 
                                </div>
                            </div>
    
                            <div class="form-group row mb-0 mt-3">

                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-dark">
                                            {{__("report.submit")}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <p class="mt-5 text-muted">{{__("report.help.privacy_note")}}</p>
    </div>
@endsection
