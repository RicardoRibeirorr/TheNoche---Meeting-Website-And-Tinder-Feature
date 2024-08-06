<div class="profile-image container">
    <img class="img-circle" src="{{$user->image}}" >
    <div class="user-options">
        @can('update', $user)
        <div class="right">
            <a class="btn btn-lg btn-light  btn-circle" href="/profile/edit"><i class="fas fa-user-edit"></i></a>
            <p class="text-center text-muted d-none d-sm-block">{{__("profile.profile.edit")}}</p>
        </div>
        @else('create', $post)
        <div class="left">
                @if(auth()->user()->email_verified_at==null)
                <a href="/email/verify" class="btn btn-lg btn-danger btn-circle"><i class="fas fa-comment"></i></a>
                @else
            <button onclick="window.loadThreadByParticipantChat({{$user->id}})" class="btn btn-lg btn-danger btn-circle"><i class="fas fa-comment"></i></button>
            @endif

            <p class="text-center text-muted d-none d-sm-block">{{__("profile.profile.chat")}}</p>
        </div>
        <div class="right">
                <a data-toggle="dropdown" class="btn btn-lg btn-light  btn-circle text-muted" href="#dropdown-profile-options"><i class="fas fa-ellipsis-h"></i></a>
        <ul aria-labelledby="dropdown-profile-options" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(723px, 42px, 0px);"><li><a href="/report/user/{{$user->id}}" title="Denuncie se conter informação ilicita ou que não lhe pertence" class="dropdown-item">{{__("profile.profile.options.report")}}</a></li></ul>
            </div>
        @endcan
    </div>
</div>
<div class="profile-info">
<h2>{{$user->name}}, {{$user->age}}</h2>
    <address class="text-muted">
        {{$user->stats->country->name .", ".$user->stats->location->name}}</address>
    <p>{{$user->description??null}}</p>
</div>