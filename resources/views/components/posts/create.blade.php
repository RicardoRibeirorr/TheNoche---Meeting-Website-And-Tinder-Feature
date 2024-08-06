<li>
        <div class="card post post-create p-0 zoom">
            <div class="card-header p-2 small">
                    {{__("post.create_header")}}
            </div>
            <div class="card-body pb-2">
                <form method="POST" action="{{ route('posts') }}">
                    @csrf
                    <div class="media"><a href="#" class="d-none d-sm-block"><img src="
                        {{$user->image}}"alt="" class="align-self-start"></a>
                        <div class="media-body ml-sm-2">
                            <input type="text" name="title" placeholder="{{__("post.holder.title")}}"
                                class="form-control pt-0 @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" autocomplete="off">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <textarea name="content" rows="2" cols="30"
                                placeholder="{{__("post.holder.description")}}"
                                class="form-control @error('content') is-invalid @enderror"
                                autocomplete="off">{{ old('content') }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-100 text-right pt-2"><select name="location_id"
                            class="form-control w-auto d-inline-block nav-link py-0 px-0  @error('location_id') is-invalid @enderror"
                            style="color: #bdbdbd;">
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}" @if(auth()->user()->stats->location_id == $location->id) selected @endif>{{$location->name}}</option>
                            @endforeach
                        </select><span>|</span><select name="type"
                            class="form-control w-auto d-inline-block nav-link py-0 mr-2  @error('type') is-invalid @enderror">
                            <option value="0" {{ old('type') && old('type')==0?"selected":"selected" }} title="{{__("tooltip.post.invite")}}">
                                    {{__("post.types.invite")}}</option>
                            <option value="1" {{ old('type') && old('type')==1?"selected":null }} title="{{__("tooltip.post.post")}}">{{__("post.types.post")}}
                            </option>
                        </select> <button type="submit" class="btn btn-sm btn-dark">{{__("post.publish")}}</button>
                    </div>
                    @error('location_id')<span class="invalid-feedback"
                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                    @error('type')<span class="invalid-feedback"
                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                </form>
            </div>
        </div>
    </li>