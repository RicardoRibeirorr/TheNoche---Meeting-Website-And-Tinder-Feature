<div class="card profile-timeline-fotos mb-0 mb-sm-4">
    <div class="card-header ">
        {{__("profile.seeking.seeking")}}
    </div>
    <div class="card-body">

        @if($user->seeking->reason||$user->seeking->music||$user->seeking->season||$user->seeking->skill||$user->seeking->language)
        <table class="w-100 text-left">
            <tbody>
                @if($user->seeking->reason)
                <tr>
                    <td class="font-weight-bold">{{__("profile.edit.seeking.reason")}}</td>
                    <td class="text-muted pl-2">{{$user->seeking->reason}}</td>
                </tr>
                @endif

                @if($user->seeking->music)
                <tr>
                    <td class="font-weight-bold">{{__("profile.edit.seeking.music")}}</td>
                    <td class="text-muted pl-2">{{$user->seeking->music}}</td>
                </tr>
                @endif

                @if($user->seeking->season)
                <tr>
                    <td class="font-weight-bold">{{__("profile.edit.seeking.season")}}</td>
                    <td class="text-muted pl-2">{{$user->seeking->season}}</td>
                </tr>
                @endif

                @if($user->seeking->skill)
                <tr>
                    <td class="font-weight-bold">{{__("profile.edit.seeking.skill")}}</td>
                    <td class="text-muted pl-2">{{$user->seeking->skill}}</td>
                </tr>
                @endif

                @if($user->seeking->language)
                <tr>
                    <td class="font-weight-bold">{{__("profile.edit.seeking.language")}}</td>
                    <td class="text-muted pl-2">{{$user->seeking->language}}</td>
                </tr>
                @endif

            </tbody>
        </table>
        @else
        @can('update', $user)
        <p class="text-muted">{{__("profile.seeking.help.no_seeking",["name"=>""])}}</p>
        @else
        <p class="text-muted">{{__("profile.seeking.help.no_seeking",["name"=>$user->name])}}</p>
        @endcan
        @endif
    </div>
</div>