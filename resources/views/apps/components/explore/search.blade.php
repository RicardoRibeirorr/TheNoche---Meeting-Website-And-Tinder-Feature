<aside class="row bg-light-1 ">
    {{-- {{auth()->user()}} --}}
    <div class="col px-0 text-right">
        <form method="POST" action="/search/explore" class="d-inline-flex py-2  text-center text-sm-right">
            @csrf
            <div class="d-grid d-sm-inline-block">
                <select name="gender" class="form-control w-auto d-inline-block nav-link py-0 px-0 "
                    style="color: rgb(189, 189, 189);">
                        <option value="-1">{{__("search.gender.gender")}}</option>
                        <option value="0" @if(auth()->user()->interest==0) selected @endif>{{__("search.gender.male")}}</option>
                        <option value="1" @if(auth()->user()->interest==1) selected @endif> </option>)>{{__("search.gender.female")}}</option>
                </select>
                <select name="location" class="form-control w-auto d-inline-block nav-link py-0 px-0 "
                    style="color: rgb(189, 189, 189);">
                    <option value="-1">{{__("search.location")}}</option>
                    @foreach ($locations as $key=>$location)
                        <option value="{{$location->id}}" @if(isset($location_selected) && $location_selected==$location->id) selected @endif>{{$location->name}}</option>
                    @endforeach
                </select></div>
            <div class="d-grid d-sm-inline-block"><input name="for" type="search" placeholder="{{__("search.holder.search")}}"
                    aria-label="Search" class="form-control form-search-input border-bottom"> <button type="submit"
                    class="btn btn-dark mr-2">{{__("search.search")}}</button></div>
        </form>
    </div>
</aside>
