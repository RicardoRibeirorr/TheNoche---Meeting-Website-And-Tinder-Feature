<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="hy92HCe5AWDiOm-hQrooUk9H04oWQRG-wqPR-0p7UEE" />
    <script data-ad-client="ca-pub-3649473809837620" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TheNoche') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @translations
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
    <link rel="manifest" href="/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand font-family-pacific py-0 font-1-5" href="{{ url('/') }}">
                    {{ config('app.name', 'TheNoche') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto navbar-list">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link font-1" href="{{ route('login') }}">{{ __('nav.session.login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('nav.session.register') }}</a>
                        </li>
                        @endif
                        @else
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link font-1" href="/explore">{{__("nav.explore")}}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link font-1" href="/embaralhar">{{ __('Shuffle') }}</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link font-1" href="/post">{{__("nav.posts")}}</a>
                        </li>
                        <li class="nav-item ">
                            <span class="nav-link font-1 d-none d-md-block">|</span>
                            <span class="nav-link font-1 d-block d-md-none">-</span>
                        </li>
                        <li class="nav-item dropdown">
                            {{-- {{auth()->user()->contact()}} --}}
                            {{-- {{dd(auth()->user()->contact)}} --}}
                            {{-- {{$countUnread}} --}}
                            <notification __auth_id="{{auth()->user()->id}}"></notification>
                        </li>

                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__("nav.profile.profile")}} <span class="caret"></span>
                            </a>

                            <div aria-labelledby="navbarDropdown"
                                class="dropdown-menu dropdown-menu-right dropdown-menu-styless text-left">
                                <a href="/profile/{{auth()->user()->id}}" class="dropdown-item px-1 ">
                                    <div class="container pt-3">
                                        <div class="media-responsive">
                                            <div><img src="{{auth()->user()->image}}" alt="Generic placeholder image"
                                                    class=" d-block img-circle mr-2" style="width:40px; height:40px;">
                                            </div>
                                            <div>
                                                <p class="my-0" style="line-height: 1.2;
                                                font-weight: 600;">{{auth()->user()->name}}</p>
                                                <p class="my-0 text-muted">
                                                    <small>{{auth()->user()->stats->country->name .", ".auth()->user()->stats->location->name}}</small>
                                                </p>

                                                {{-- <p class="text-center mb-1"><span
                                                        class="badge badge-secundary mr-3">PRO</span>
                                                    <span class="badge badge-secundary mr-3">TOKENS
                                                        £79</span></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="list-unstyled px-3 text-center">
                                    <li>
                                        <p class="mb-0 mt-2 text-muted small"
                                            style="border-bottom: 1px solid rgb(241, 241, 241);">
                                            {{__("nav.profile.options.profile.title")}}</p>
                                    </li>
                                    <li><a href="/profile/{{auth()->user()->id}}"
                                            class="dropdown-item">{{__("nav.profile.options.profile.visit")}}</a></li>
                                    <li><a href="/profile/edit"
                                            class="dropdown-item">{{__("nav.profile.options.profile.edit")}}</a></li>


                                    {{-- <li>
                                        <p class="mb-0 mt-2 text-muted small"
                                            style="border-bottom: 1px solid rgb(241, 241, 241);">Comprar
                                        </p>
                                    </li>
                                    <li><a href="/a/create" class="dropdown-item">Tokens</a></li>
                                    <li><a href="/a/create" class="dropdown-item">Pacotes</a></li>--}}
                                    <li>
                                        <p class="mb-0 mt-2 text-muted small"
                                            style="border-bottom: 1px solid rgb(241, 241, 241);"></p>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">{{__("nav.profile.options.logout")}}</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-4">
            @auth
            @if(auth()->user()->email_verified_at==null)
            <div class="notification row">
                <div class="col-1 col-sm-1 icon"><i class="fas fa-bookmark"></i></div>
                <div class="col-10 col-sm-8 font-weight-bold note">Ainda não confirmou o seu email. Por favor confirme o
                    email para poder usufluir de todas as ferramentas que temos para si.</div>
                <div class="col-12 col-sm-3 text-center px-0"><a href="/email/verify"
                        class="btn btn-dark btn-sm btn-rounded">Confirmar email</a></div>
            </div>
            @endif
            @endauth
            @yield('content')

            @auth
            <chat __thread_id="{{auth()->user()->stats->thread_id}}" __auth="{{json_encode([
                "id"=>auth()->user()->id,
                "name"=>auth()->user()->name,
                "imageUrl"=>auth()->user()->image,
            ])}}"></chat>
            @endauth

            {{-- <script src="js/ads.js"></script> --}}
            {{-- <Ads></Ads> --}}
        </main>

        <footer class="page-footer bg-dark font-small text-white">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">
                <div class="text-muted">© 2019 Copyright:
                    <a href="/" target="_blank"> TheNoche</a> | <a target="_blank" href="/terms/term">Terms &
                        Conditions</a> | <a target="_blank" href="/terms/privacy">Privacy Policy</a></div>
            </div>
            <!-- Copyright -->

        </footer>
    </div>
</body>

</html>