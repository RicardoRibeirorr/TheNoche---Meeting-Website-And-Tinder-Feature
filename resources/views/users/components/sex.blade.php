<div class="col-6 offset-sm-1 col-sm-2">
    <p class="text-center text-muted"><b class="text-dark">{{__("profile.gender.gender")}}</b> <br>
        @if ($user->gender==0)
        {{__("profile.gender.male")}}
        @else
        {{__("profile.gender.female")}}
        @endif</p>
</div>
<div class="col-6 offset-sm-6 col-sm-2">
    <p class="text-center text-muted"><b class="text-dark">{{__("profile.interest.interest")}}</b> <br>
        @if ($user->interest==0)
        {{__("profile.interest.male")}}
        @elseif($user->interest==1)
        {{__("profile.interest.female")}}
        @else
        {{__("profile.interest.both")}}
        @endif</p>
</div>