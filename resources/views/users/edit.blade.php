@extends('layouts.app')

@section('content')
<div class="container">
<form action="/profile/update/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method("PUT")
        <div class="container">
            <div class="row">

                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small>{{__("profile.edit.help.public_info")}}</small></p>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-9 col-lg-10 pt-4">
                            <div class="line"></div>
                            <div class="form-group row  justify-content-center">
                                <label for="name" class="col-md-4 col-form-label">{{__("profile.edit.name")}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') ?? $user->name}}" maxlength="20" required placeholder="{{__("profile.edit.holder.name")}}" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="age" class="col-md-4 col-form-label">{{__("profile.edit.age")}}</label>

                                <div class="col-md-6">
                                    <input id="age" type="text"
                                        class="form-control @error('age') is-invalid @enderror" name="age"
                                        value="{{ old('age') ?? $user->age}}" min="18" max="120" required autofocus>

                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="gender"
                                    class="col-md-4 col-form-label">{{__("profile.gender.gender")}}</label>
                                <div class="col-md-6">
                                    <select id="gender" 
                                        class="form-control @error('gender') is-invalid @enderror" name="gender">
                                        <option value="-1" @if ($user->gender == null && old('gender')==null)
                                                selected @endif >{{__("profile.gender.none")}}</option>
                                    <option value="0" @if (old('gender') =="0" || $user->gender =="0")
                                        selected @endif >{{__("profile.gender.male")}}</option>
                                    <option value="1" @if (old('gender') =="1" || $user->gender =="1")
                                        selected @endif >{{__("profile.gender.female")}}</option>
                                </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="interest"
                                    class="col-md-4 col-form-label">{{__("profile.interest.interest")}}</label>
                                <div class="col-md-6">
                                    <select id="interest" 
                                        class="form-control @error('interest') is-invalid @enderror" name="interest">
                                    <option value="-1" @if ($user->interest == null && old('interest')==null)
                                        selected @endif >{{__("profile.interest.none")}}</option>
                                    <option value="0" @if (old('interest') =="0" || $user->interest =="0")
                                        selected @endif >{{__("profile.interest.male")}}</option>
                                    <option value="1" @if (old('interest') =="1" || $user->interest =="1")
                                        selected @endif >{{__("profile.interest.female")}}</option>
                                    <option value="2" @if (old('interest') =="2" || $user->interest =="2")
                                        selected @endif >{{__("profile.interest.both")}}</option>
                                </select>
                                    @error('interest')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="description" class="col-md-4 col-form-label">{{__("profile.edit.description")}}</label>

                                <div class="col-md-6">
                                    <textarea rows="2" id="description" maxlength="255"
                                        class="form-control @error('description') is-invalid @enderror"
                                        name="description" placeholder="{{__("profile.edit.holder.description")}}">{{ old('description') ?? $user->description}}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2 order-first order-md-last pt-3 px-0">
                            <div class="row">
                                <label for="image" class="col-12 col-form-label text-center px-0">
                                    <img id="image-container" class="img-fluid img-thumbnail rounded-circle"
                                        style="height: 150px;width:150px;" src="{{$user->image}}"alt="">
                                    <p class="pt-1 text-muted">{{__("profile.edit.load_image")}}</p>
                                </label>
                                <div class="col-md-6 text-center">
                                    <input id="image" type="file"
                                        class="form-control-file @error('image') is-invalid @enderror collapse"
                                        name="image"
                                        onchange="
                                                         document.getElementById('image-container').src = window.URL.createObjectURL(this.files[0]) "
                                        accept="image/*">
                                    @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small>{{__("profile.edit.help.seeking_info")}}</small></p>
                    <div class="form-group row  justify-content-center">
                        <label for="reason" class="col-md-4 col-form-label">{{__("profile.edit.seeking.reason")}}</label>

                        <div class="col-md-6">
                            <input id="reason" type="text"
                                class="form-control @error('reason') is-invalid @enderror" name="reason"
                                value="{{ old('reason') ?? $user->seeking->reason}}" placeholder="{{__("profile.edit.holder.seeking.reason")}}" maxlength="40" autofocus>

                            @error('reason')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row  justify-content-center">
                        <label for="music" class="col-md-4 col-form-label">{{__("profile.edit.seeking.music")}}</label>

                        <div class="col-md-6">
                            <input id="music" type="text"
                                class="form-control @error('music') is-invalid @enderror" name="music" placeholder="{{__("profile.edit.holder.seeking.music")}}" 
                                value="{{ old('music') ?? $user->seeking->music}}" maxlength="40" autofocus>

                            @error('music')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row  justify-content-center">
                        <label for="season" class="col-md-4 col-form-label">{{__("profile.edit.seeking.season")}}</label>

                        <div class="col-md-6">
                            <input id="season" type="text"
                                class="form-control @error('season') is-invalid @enderror" name="season" placeholder="{{__("profile.edit.holder.seeking.season")}}" 
                                value="{{ old('season') ?? $user->seeking->season}}"  maxlength="40" autofocus>

                            @error('season')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row  justify-content-center">
                        <label for="skill" class="col-md-4 col-form-label">{{__("profile.edit.seeking.skill")}}</label>

                        <div class="col-md-6">
                            <input id="skill" type="text"
                                class="form-control @error('skill') is-invalid @enderror" name="skill" placeholder="{{__("profile.edit.holder.seeking.skill")}}" 
                                value="{{ old('skill') ?? $user->seeking->skill}}"  maxlength="40" autofocus>

                            @error('skill')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row  justify-content-center">
                        <label for="language" class="col-md-4 col-form-label">{{__("profile.edit.seeking.language")}}</label>

                        <div class="col-md-6">
                            <input id="language" type="text"
                                class="form-control @error('language') is-invalid @enderror" name="language" placeholder="{{__("profile.edit.holder.seeking.language")}}" 
                                value="{{ old('language') ?? $user->seeking->language}}"  maxlength="40" autofocus >

                            @error('language')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small>{{__("profile.edit.help.private_info")}}</small></p>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-9 col-lg-10 pt-4">

                            <div class="form-group row  justify-content-center">
                                <label for="email" class="col-md-4 col-form-label">{{__("profile.edit.email")}}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') ?? $user->email}}" required autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="phone" class="col-md-4 col-form-label">{{__("profile.edit.phone")}}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') ?? $user->phone}}" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2 "></div>
                    </div>
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small>{{__("profile.edit.help.password")}}</small></p>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-9 col-lg-10 pt-4">

                            <div class="form-group row  justify-content-center">
                                <label for="password" class="col-md-4 col-form-label">{{__("profile.edit.old_password")}}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="password" placeholder="************">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="new_password" class="col-md-4 col-form-label">{{__("profile.edit.new_password")}}</label>
                                <div class="col-md-6">
                                    <input id="new_password" type="password"
                                        class="form-control @error('new_password') is-invalid @enderror"
                                        name="new_password" autocomplete="new-new_password">

                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  justify-content-center">
                                <label for="confirm_password"
                                    class="col-md-4 col-form-label">{{__("profile.edit.confirm_password")}}</label>
                                <div class="col-md-6">
                                    <input id="confirm_password" type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        name="confirm_password" autocomplete="new-password">
                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2 "></div>
                    </div>
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 col-sm-6 content text-left"><button type="button" data-toggle="modal"
                        data-target="#delete_model" class="btn btn-light mt-4 mb-3">{{__("profile.edit.delete")}}</button></div>
                <div class="col-12 col-sm-6 content text-right"><button type="submit"
                        class="btn btn-primary mt-4 mb-3">{{__("profile.edit.save")}}</button></div>
            </div>
        </div>
    </form>

    {{-- Modal for delete --}}
    <div id="delete_model" tabindex="-1" role="dialog" aria-labelledby="delete_modelTitle" class="modal fade"
        aria-modal="true">
        <div role="document" class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <p class="pt-2 mb-0">{{__("profile.edit.help.confirm_delete")}}</p>
                    <p class="pb-2 small text-muted">{{__("profile.edit.help.confirm_delete_note")}}</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 pb-2 border-top">
                                <form action="/user/{{$user->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="btn btn-light w-100 bg-white border-0 text-danger">{{__("profile.edit.delete")}}</button>
                                </form>

                            </div>
                            <div class="col-12 pb-2 border-top"><button type="button" data-dismiss="modal"
                                    class="btn btn-light w-100 bg-white border-0">{{__("profile.edit.cancel")}}</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection