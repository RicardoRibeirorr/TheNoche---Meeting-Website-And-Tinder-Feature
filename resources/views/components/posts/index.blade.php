<li>

    <article class="post media"><a href="/profile/{{$post->user_id}}"><img src="{{$post->user->image}}" alt="user"
                class="d-flex align-self-start mr-3" ></a>
        <div class="media-body">
            <h5 class="my-0 font-weight-bold mr-4 @if($post->active==" 0" || $post->expire_at<$date_now) text-muted
                    @endif"> {{$post->title}} <small>|
                        {{$post->location->name}} </small></h5> <a href="#" id="dropdown_menu_post_{{$post->id}}"
                data-toggle="dropdown" class="btn-menu btn"><i class="fas fa-ellipsis-h"></i></a>
            <ul class="dropdown-menu" aria-labelledby="dropdown_menu_post_{{$post->id}}">
                @if ($post->user->id == auth()->user()->id)
                @if($post->active=="0" || $post->expire_at>$date_now)

                <li><a class="dropdown-item" href="#post-expire-form" onclick="event.preventDefault();
                    document.getElementById('post-expire-form').submit();"
                        title="{{__("tooltip.post.close")}}">{{__("post.options.close")}}</a>
                    <form id="post-expire-form" action="/post/expire/{{$post->id}}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </li>
                {{-- <li><a class="dropdown-item" href="#"
                        title="Deixe de receber notificações e respostas para esta publicação">Bloquear
                        notificações</a></li> --}}
                <li class="line"></li>
                @endif
                <li><a class="dropdown-item" href="#post-delete-form" onclick="event.preventDefault();
                    document.getElementById('post-delete-form').submit();"
                        title="{{__("tooltip.post.delete")}}">{{__("post.options.delete")}}</a>
                    <form id="post-delete-form" action="/post/{{$post->id}}" method="POST" style="display: none;">
                        @csrf
                        @method("delete")
                    </form>
                </li>
                @else
                <li><a class="dropdown-item" href="/report/post/{{$post->id}}"
                        title="{{__("tooltip.post.report")}}">{{__("post.options.report")}}</a></li>
                @endif
            </ul>
            <p class="small text-muted mb-1 @if($post->active==" 0" ||$post->expire_at<$date_now) text-muted
                    text-line-through @endif"><b class="text-dark">
                        @if($post->active=="0" ||$post->expire_at<$date_now) {{__("post.closed")}} @endif @if ($post->
                            type==0)
                            {{__("post.types.invite")}}
                            @elseif($post->type==1)
                            {{__("post.types.post")}}
                            @endif </b>
                    {{-- {{dd($Carbon->setTimeFrom($post->expire_at))}} --}}
                    | {{__("post.posted_at")}} {{\Carbon\Carbon::parse($post->created_at)}} | @if($post->expire_at>$date_now)
                    {{__("post.expires_at")}} @else {{__("post.closed_at")}} @endif
                    {{\Carbon\Carbon::parse($post->expire_at)}}
                    {{-- <time_format timestamp="{{$post->created_at}}"></time_format> --}}
                    {{-- @if ($post->expire_at) --}}
                    {{-- | Expira a <time_format timestamp="{{$post->expire_at}}"></time_format> --}}

                    {{-- @endif</p> --}}
                    <p>{{$post->content}}</p>
                    {{-- $post->notify && --}}
                    @if ( $post->user_id != auth()->user()->id)
                    <div class="w-100 text-right">
                        @if(auth()->user()->email_verified_at==null)

                        <a href="/email/verify" class="btn btn-sm btn-dark">{{__("post.answer")}}</a>
                        @else
                        <button onclick="window.loadThreadByParticipantChat({{$post->user_id}},{
            'post_id':{{$post->id}}
        });" class="btn btn-sm btn-dark">{{__("post.answer")}}</button>
                        @endif
                    </div>
                    @endif
        </div>
    </article>
</li>
