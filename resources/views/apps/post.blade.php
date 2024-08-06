@extends('layouts.app')
{{-- @inject('carbon', new Carbon()) --}}
@section('content')
<div>

    <div class="container container-md">
        @include('apps.components.posts.search')
    </div>

    <ul class=" list-unstyled container pt-5">
        @include('components.posts.create')
        @if($posts->count()>0)
        @foreach ($posts as $post)
            @include('components.posts.index')
        @endforeach
        <li class="pagination-center">{{$posts->links()}}</li>
        @endif

        @if($others!=null && $others->count()>0)
    <li><p class="text-center text-muted">{{__("post.help.list_others")}}</p></li>
        @foreach ($others as $post)
            @include('components.posts.index')
        @endforeach
        <li class="pagination-center">{{$others->links()}}</li>
        @endif

        @if($others!=null && $others->count()<6 && $posts->count()<6)
            <li><p class="text-center py-3">{{__("post.no_results")}}</p></li>
        @endif
        
    </ul>

</div>
@endsection
