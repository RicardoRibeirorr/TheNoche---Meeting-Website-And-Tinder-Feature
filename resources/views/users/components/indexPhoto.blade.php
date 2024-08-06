<li class=" container text-muted border rounded mb-2 py-3 position-relative">
    <div class="media-responsive">
        <div >
            <div class="d-grid"><img style="width:40px;height:40px;" class="img-circle" src="{{$user->image}}" ></div>
        </div>
        <div class="pl-2">
            <time class="m-0 small">{{__("profile.photo.posted_at")}} {{$photo->created_at->diffForHumans()}}</time>
            @if ($photo->description)
            <p class="m-0">{{$photo->description}}</p>
            @else
            <p class="m-0 small">{{__("profile.photo.no_description")}}</p>
            @endif
        </div>
    </div>
    
    <a href="dropdown-photo-{{$photo->id}}" class="btn position-absolute text-muted " style="top:0;right:0;margin:8px 15px 0 0;" data-toggle="dropdown"><i
        class="fas fa-ellipsis-h"></i></a>
    
    <ul class="dropdown-menu" aria-labelledby="dropdown-photo-{{$photo->id}}">
        @if ($photo->user->id == auth()->user()->id)
        <li> <a class="dropdown-item" href="#photo-delete-form" onclick="event.preventDefault();
                            document.getElementById('photo-delete-form').submit();">{{__("profile.photo.options.delete")}}</a>

            <form id="photo-delete-form" action="/photo/{{$photo->id}}" method="POST" style="display: none;">
                @csrf
                @method("delete")
            </form>
        </li>
        @else
    <li><a class="dropdown-item" href="/report/photo/{{$photo->id}}"
                title="Denuncie se conter informação ilicita ou que não lhe pertence">{{__("profile.photo.options.report")}}</a></li>
        @endif
    </ul>
    <div class="d-block mt-2">
        <img src="{{$photo->url}}" class="w-100 mb-2 " >
    </div>
</li>
