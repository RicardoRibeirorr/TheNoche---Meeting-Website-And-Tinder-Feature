@extends('layouts.app')

@section('content')
<div>
        <div class="container container-md">
                @include('apps.components.explore.search')
        </div>
        <div class="container container-md pt-5">
                <div class="row mb-4">
                @if ($users->count()>0)

                @foreach ($users as $key=>$user)
                {{-- ads item --}}
                {{-- @includeWhen($key==2 || $key==6, 'components.explore.ad') --}}
                {{-- end ads item --}}
                {{-- Item --}}
                @include('components.explore.index')
                {{-- End Item --}}
                @endforeach
                <div class="col-12 mt-4 d-flex justify-content-center">
                        {{$users->links()}}
                </div>
                @endif
                @if($users->count()<7 && $users->nextPageUrl()==null && $others!=null && $others->count()>0)
                        <div class="col-12 mt-4 text-center text-muted">
                                        {{__("explore.help.list_others")}}
                        </div>
                        @foreach ($others as $key=>$user)
                        {{-- ads item --}}
                        {{-- @includeWhen($key==2|| $key==1 && $others->count()==2 || $key==6, 'components.explore.ad') --}}
                        {{-- end ads item --}}
                        {{-- Item --}}
                        @include('components.explore.index')
                        {{-- End Item --}}
                        @endforeach
                @endif
                @if(($others!=null && $others->count()==0) && $users->count()==0)
                <div class="col-12 mt-4 text-center">
                                {{__("explore.no_results")}}
                </div>
                @endif
                </div>
        </div>
</div>
@endsection