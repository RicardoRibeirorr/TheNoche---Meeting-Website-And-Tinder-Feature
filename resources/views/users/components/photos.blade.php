<div class="card profile-timeline-fotos mb-0 mb-sm-4">
    <div class="card-header">
        Fotografias
    </div>
    <div class="card-body">
        <ul class="list-unstyled">
            @can('update', $user)
            <li>
                <label data-toggle="modal" data-target="#modal_updload_image" for="upload_image"
                    class="other-options display-4 text-dark mx-0 " style="font-size: 35px;"><i
                        class="fas fa-plus-circle"></i></label>
            </li>
            @endcan

            @foreach ($photoSamples as $key=>$photo)
            <li><a href="/profile/{{$user->id}}/photos"><img src="{{$photo->url}}" srcset="/storage/default/profile.svg"></a></li>
            @endforeach
            @if (count($photoSamples)>9)
            <li>
                <a href="/profile/{{$user->id}}/photos" class=" text-muted">
                    <div class="other-options">+9</div>
                </a>
            </li>
            @elseif(count($photoSamples)==0)
            <li class="w-100 h-auto">
                @can('update', $user)
                <p class="text-muted">{!!__("profile.photo.help.add_message",["icon"=>'<i class="fas fa-plus-circle"></i>'])!!}</p>
                @else
                <p class="text-muted">{{__("profile.no_photos")}}</p>
                @endcan
            </li>
            @endif
        </ul>
    </div>
    @if ($user->id == auth()->user()->id)
    <div id="modal_updload_image" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="POST" action="/photo" class="modal-content" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="min-height:30vh; max-height: 40vh; overflow:hidden;">
                        <label for="upload_image" class="position-relative w-100">
                            <p class="position-absolute w-100 text-center text-muted mt-3">{{__("profile.photo.help.add_message",["icon"=>""])}}</p>
                            <img id="image" class="w-100" src="/storage/default/profile.svg">
                        </label>
                    </div>
                    <textarea id="description" class="form-control mt-3" name="description"
                        placeholder="Deixe uma pequena descrição" rows="3"></textarea>
                    <input id="upload_image" name="upload_image" class="form-control input-rounded mt-3 w-100"
                        style="padding-bottom: 2.2rem;" type="file" accept="image/*" onchange="
                            document.getElementById('image').src = window.URL.createObjectURL(this.files[0]) ">
                </div>
                <div class="modal-footer text-right">
                    <button class="btn btn-dark">{{__("profile.photo.add")}}</button>
                </div>
            </form>
        </div>
    </div>
    @endif

</div>
