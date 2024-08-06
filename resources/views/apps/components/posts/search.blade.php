<aside class="row bg-light-1 ">
    <div class="col px-0">
        <ul id="post-nav" class="text-center text-sm-left">
            <li class="nav-item @if($type==null) active @endif"><a href="/post" class="nav-link">{{__("search.all")}}</a></li>
            <li class="nav-item @if($type=="invite") active @endif"><a href="/post/invites"
                    class="nav-link">{{__("search.invites")}} @if($type!="invite") <span
                        class="badge badge-danger badge-point"><b></b></span>@endif</a></li>
            <li class="nav-item @if($type=="event") active @endif"><a href="/post/events"
                    class="nav-link">{{__("search.posts")}} @if($type!="event") <span
                        class="badge badge-danger badge-point"><b></b></span>@endif</a></li>
        </ul>
    </div>
    <div class="col px-0 text-right">
        <form method="POST" action="/search/post/{{$type}}" class="d-inline-flex py-2  text-center text-sm-right">
            @csrf
            <div class="d-grid d-sm-inline-block">
                {{-- <button class="btn  w-auto nav-link py-0 px-0 form-search-input"
                    style="color: rgb(189, 189, 189);">Pais</button> --}}
                <select name="location" class="form-control w-auto d-inline-block nav-link py-0 px-0 "
                    style="color: rgb(189, 189, 189);">
                    <option value="-1">{{__("search.location")}}</option>
                    @foreach ($locations as $location)
                        <option value="{{$location->id}}" @if( old('location') ==  $location->id) selected @endif>{{$location->name}}</option>
                    @endforeach

                </select></div>
            <div class="d-grid d-sm-inline-block"><input name="for" type="search" placeholder="{{__("search.holder.search")}}"
                    aria-label="Search" class="form-control form-search-input border-bottom" value="{{ old('for') }}"> <button type="submit"
                    class="btn btn-dark mr-2">{{__("search.search")}}</button></div>
        </form>
    </div>
</aside>
