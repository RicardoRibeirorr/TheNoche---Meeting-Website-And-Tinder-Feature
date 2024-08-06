<div class="col-sm-6 col-md-4 profile-item zoom">
        <div class="img-container">
                <a target="_blank" rel="noopener noreferrer" href="/profile/{{$user->id}}"><img src="{{$user->image}}"class="img-profile"></a>
        </div>
        <div class="info-container">
                <a target="_blank" rel="noopener noreferrer" href="/profile/{{$user->id}}"> <h3>{{$user->name}}</h3>
            <p>{{$user->description??__("explore.no_description")}}</p></a>
        </div>
        <div class="options-container text-center">
            <a target="_blank" rel="noopener noreferrer" href="/profile/{{$user->id}}">{{__("explore.see_profile")}}</a>
        </div>
    </div>