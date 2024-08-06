@extends('layouts.app')

@section('content')
<div id="profile-show" class="container container-max">
    @include('users.components.info')
    <div class="row mt-4">
        @include('users.components.sex')
        <div class="col-12 offset-sm-1 col-sm-10">
            <hr class="mt-1">
        </div>
    </div>
    <div class="container container-max px-0">
        <div class="row">
            <div class="col-12 col-md-3 offset-md-1">
                @include('users.components.seeking')
                @include('users.components.photos')
                {{-- @include('users.components.people') --}}
            </div>
            {{-- Posts --}}
            <div class="col-12 col-md-6 offset-md-1 profile-timeline-posts">
                <ul class=" list-unstyled list-inline text-center">
                    <li><a class="btn btn-link" href="/profile/{{$user->id}}/photos">{{__("profile.photos")}}</a></li>
                    <li><a class="btn btn-link" href="/profile/{{$user->id}}">{{__("profile.posts")}}</a></li>
                </ul>
                <ul class=" list-unstyled">
                    @if($type && $type=="photos")
                    @if ($photos->count()>0)
                    @foreach ($photos as $photo)
                    @include('users.components.indexPhoto')
                    @endforeach
                    @else
                    <p class="text-muted text-center">{{__("profile.no_photos")}}</p>
                    @endif
                    <li class="pagination-center mt-4">{{$photos->links()}}</li>
                    @else
                    @can('update', $user)
                    @include('components.posts.create')
                    @endcan
                    @foreach ($posts as $key=>$post)
                    @include('components.posts.index')
                    {{-- @each('components.posts.index', $posts, 'post') --}}
                    @endforeach
                    @if (count($posts)==0)
                    <li class="w-100" style="height:50px;">
                        <p class="text-muted text-center">{{__("profile.no_posts")}}</p>
                    </li>
                    @endif
                    <li class="text-center">{{ $posts->links() }}</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection