<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="hy92HCe5AWDiOm-hQrooUk9H04oWQRG-wqPR-0p7UEE" />
    <script data-ad-client="ca-pub-3649473809837620" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <style>
.font-family-pacific {
    font-family: "Pacifico", cursive;
}
.nav-link,.navbar-toggler,.navbar-brand{
    padding-top:0!important;
    padding-bottom:0!important;
}
.text-white{
  color:#fff!important;
}
.text-red{
  color:red;
}
        </style>
    <!-- Styles -->
    <link rel="stylesheet" href="/welcome/css/landio.css">
</head>
<body>
        <nav class="navbar navbar-dark bg-inverse bg-inverse-custom navbar-fixed-top">
                <div class="container">
                  <a class="navbar-brand font-family-pacific text-red" href="#">
                      TheNoche
                  </a>
                  <div id="collapsingNavbar" class="collapse navbar-toggleable-custom" role="tabpanel" aria-labelledby="collapsingNavbar">
                    <ul class="nav navbar-nav pull-xs-right">
                      <li class="nav-item nav-item-toggable">
                        <a class="nav-link" href="/login" >{{__("nav.session.login")}}</a>
                      </li>
                      <li class="nav-item nav-item-toggable">
                        <a class="nav-link" href="/register" >{{__("nav.session.register")}}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
          
              <!-- Hero Section
              ================================================== -->
          
              <header class="jumbotron bg-inverse text-xs-center center-vertically" role="banner">
                <div class="container">
                  <h1 class="display-3 font-family-pacific text-red">TheNoche</h1>
                  <h2 class="m-b-3"> {!!__("welcome.hero.slogan",["name"=>'<em class="font-family-pacific text-red">TheNoche</em>'])!!}</h2>
                  <a class="btn btn-secondary-outline m-b-1" href="/login" role="button"></span>{{__("welcome.login")}}</a>
                  <a class="btn btn-secondary-outline m-b-1 m-l-1" href="/register" role="button"></span>{{__("welcome.register")}}</a>
                  <ul class="nav nav-inline social-share">
                    <li class="nav-item"><span><span class="icon-user"></span> {{__("welcome.hero.user_count")}}</span></li>
                    <li class="nav-item"><span><span class="icon-heart"></span> {{__("welcome.hero.relation_count")}}</span></li>
                    <li class="nav-item"><span><span class="icon-thunderbolt"></span> {{__("welcome.hero.event_count")}}</span></li>
                  </ul>
                </div>
              </header>
          
              <!-- Intro
              ================================================== -->
          
              <section class="section-intro bg-faded text-xs-center">
                <div class="container">
                  <h3 class="wp wp-1">{{__("welcome.intro.title")}}</h3>
                  <p class="lead wp wp-2">{!!__("welcome.intro.subtitle",["name"=>"<em class='font-family-pacific text-red'>TheNoche</em>"])!!}</p>
                </div>
              </section>
          
              <!-- Features
              ================================================== -->
          
              <section class="section-features text-xs-center">
                <div class="container">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="card m-b-0">
                            <div class="card-block">
                              <span class="icon-heart display-1"></span>
                              <h4 class="card-title" style="font-size:1.5rem;">{{__("welcome.feature.social.title")}}</h4>
                              <h6 class="card-subtitle text-muted">{{__("welcome.feature.social.subtitle")}}</h6>
                              <p class="card-text">{{__("welcome.feature.social.description")}}</p>
                            </div>
                          </div>
                        </div>
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-block">
                          <span class="icon-search display-1"></span>
                          <h4 class="card-title" style="font-size:1.5rem;">{{__("welcome.feature.explore.title")}}</h4>
                          <h6 class="card-subtitle text-muted">{{__("welcome.feature.explore.subtitle")}}</h6>
                          <p class="card-text">{{__("welcome.feature.explore.description")}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-block">
                          <span class="icon-thunderbolt display-1"></span>
                          <h4 class="card-title" style="font-size:1.5rem;">{{__("welcome.feature.post.title")}}</h4>
                          <h6 class="card-subtitle text-muted">{{__("welcome.feature.post.subtitle")}}</h6>
                          <p class="card-text">{{__("welcome.feature.post.description")}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
{{--           
              <!-- Video
              ================================================== -->
          
              <section class="section-video bg-inverse text-xs-center wp wp-4">
                <h3 class="sr-only">Video</h3>
                <video id="demo_video" class="video-js vjs-default-skin vjs-big-play-centered" controls poster="img/video-poster.jpg" data-setup='{}'>
                  <source src="http://vjs.zencdn.net/v/oceans.mp4" type='video/mp4'>
                  <source src="http://vjs.zencdn.net/v/oceans.webm" type='video/webm'>
                </video>
              </section> --}}
          
              {{-- <!-- Pricing
              ================================================== -->
              <section class="section-pricing bg-faded text-xs-center">
                <div class="container">
                  <h3>Manage your subscriptions</h3>
                  <div class="row p-y-3">
                    <div class="col-md-4 p-t-md wp wp-5">
                      <div class="card pricing-box">
                        <div class="card-header text-uppercase">
                          Personal
                        </div>
                        <div class="card-block">
                          <p class="card-title">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras.</p>
                          <h4 class="card-text">
                            <sup class="pricing-box-currency">$</sup>
                            <span class="pricing-box-price">19</span>
                            <small class="text-muted text-uppercase">/month</small>
                          </h4>
                        </div>
                        <ul class="list-group list-group-flush p-x">
                          <li class="list-group-item">Sed risus feugiat</li>
                          <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
                          <li class="list-group-item">Sed risus feugiat fusce</li>
                        </ul>
                        <a href="#" class="btn btn-primary-outline">Get Started</a>
                      </div>
                    </div>
                    <div class="col-md-4 stacking-top">
                      <div class="card pricing-box pricing-best p-x-0">
                        <div class="card-header text-uppercase">
                          Professional
                        </div>
                        <div class="card-block">
                          <p class="card-title">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras.</p>
                          <h4 class="card-text">
                            <sup class="pricing-box-currency">$</sup>
                            <span class="pricing-box-price">49</span>
                            <small class="text-muted text-uppercase">/month</small>
                          </h4>
                        </div>
                        <ul class="list-group list-group-flush p-x">
                          <li class="list-group-item">Sed risus feugiat</li>
                          <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
                          <li class="list-group-item">Sed risus feugiat fusce</li>
                          <li class="list-group-item">Sed risus feugiat</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Get Started</a>
                      </div>
                    </div>
                    <div class="col-md-4 p-t-md wp wp-6">
                      <div class="card pricing-box">
                        <div class="card-header text-uppercase">
                          Enterprise
                        </div>
                        <div class="card-block">
                          <p class="card-title">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras.</p>
                          <h4 class="card-text">
                            <sup class="pricing-box-currency">$</sup>
                            <span class="pricing-box-price">99</span>
                            <small class="text-muted text-uppercase">/month</small>
                          </h4>
                        </div>
                        <ul class="list-group list-group-flush p-x">
                          <li class="list-group-item">Sed risus feugiat</li>
                          <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
                          <li class="list-group-item">Sed risus feugiat fusce</li>
                        </ul>
                        <a href="#" class="btn btn-primary-outline">Get Started</a>
                      </div>
                    </div>
                  </div>
                </div>
              </section> --}}
          
              <!-- Testimonials
              ================================================== -->
{{--           
              <section class="section-testimonials text-xs-center bg-inverse">
                <div class="container">
                  <h3 class="sr-only">{{__("welcome.testimonial.title")}}</h3>
                  <div id="carousel-testimonials" class="carousel slide" data-ride="carousel" data-interval="0">
                    <div class="carousel-inner" role="listbox">
                      <div class="carousel-item active">
                        <blockquote class="blockquote">
                          <img src="{{__("welcome.testimonial.0.image")}}" height="80" width="80" alt="Avatar" class="img-circle">
                          <p class="h3">{{__("welcome.testimonial.0.content")}}</p>
                          <footer>{{__("welcome.testimonial.0.name")}}</footer>
                        </blockquote>
                      </div>
                      <div class="carousel-item">
                        <blockquote class="blockquote">
                          <img src="{{__("welcome.testimonial.1.image")}}" height="80" width="80" alt="Avatar" class="img-circle">
                          <p class="h3">{{__("welcome.testimonial.1.content")}}</p>
                          <footer>{{__("welcome.testimonial.1.name")}}</footer>
                        </blockquote>
                      </div>
                      <div class="carousel-item">
                        <blockquote class="blockquote">
                          <img src="{{__("welcome.testimonial.2.image")}}" height="80" width="80" alt="Avatar" class="img-circle">
                          <p class="h3">{{__("welcome.testimonial.2.content")}}</p>
                          <footer>{{__("welcome.testimonial.2.name")}}</footer>
                        </blockquote>
                      </div>
                      <div class="carousel-item">
                        <blockquote class="blockquote">
                          <img src="{{__("welcome.testimonial.3.image")}}" height="80" width="80" alt="Avatar" class="img-circle">
                          <p class="h3">{{__("welcome.testimonial.3.content")}}</p>
                          <footer>{{__("welcome.testimonial.3.name")}}</footer>
                        </blockquote>
                      </div>
                      <div class="carousel-item">
                        <blockquote class="blockquote">
                          <img src="{{__("welcome.testimonial.4.image")}}" height="80" width="80" alt="Avatar" class="img-circle">
                          <p class="h3">{{__("welcome.testimonial.4.content")}}</p>
                          <footer>{{__("welcome.testimonial.4.name")}}</footer>
                        </blockquote>
                      </div>
                    </div>
                    <ol class="carousel-indicators">
                      <li class="active"><img src="{{__("welcome.testimonial.0.image")}}" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="0" class="img-fluid img-circle"></li>
                      <li><img src="{{__("welcome.testimonial.1.image")}}" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="1" class="img-fluid img-circle"></li>
                      <li><img src="{{__("welcome.testimonial.2.image")}}" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="2" class="img-fluid img-circle"></li>
                      <li><img src="{{__("welcome.testimonial.3.image")}}" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="3" class="img-fluid img-circle"></li>
                      <li><img src="{{__("welcome.testimonial.4.image")}}" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="4" class="img-fluid img-circle"></li>
                    </ol>
                  </div>
                </div>
              </section>
           --}}
              <!-- Text Content
              ================================================== -->
              <section class="section-text bg-inverse ">
                <div class="container ">
                  <h3 class="text-xs-center">{!!__("welcome.about.title",["name"=>"<em class='font-family-pacific text-red'>TheNoche</em>"])!!}</h3>
                  <div class="row p-y-3">
                    <div class="col-md-5">
                      <p class="wp wp-7">{{__("welcome.about.resume")}}</p>
                    </div>
                    <div class="col-md-5 col-md-offset-2 separator-x">
                      <p class="wp wp-8">{{__("welcome.about.user")}}</p>
                    </div>
                  </div>
                </div>
              </section>

          
              {{-- <!-- News
              ================================================== -->
          
              <section class="section-news">
                <div class="container">
                  <h3 class="sr-only">News</h3>
                  <div class="bg-inverse">
                    <div class="row">
                      <div class="col-md-6 p-r-0">
                        <figure class="has-light-mask m-b-0 image-effect">
                          <img src="https://images.unsplash.com/photo-1442328166075-47fe7153c128?q=80&fm=jpg&w=1080&fit=max" alt="Article thumbnail" class="img-fluid">
                        </figure>
                      </div>
                      <div class="col-md-6 p-l-0">
                        <article class="center-block">
                          <span class="label label-info">Featured article</span>
                          <br>
                          <h5><a href="#">Design studio with product designer Peter Finlan <span class="icon-arrow-right"></span></a></h5>
                          <p class="m-b-0">
                            <a href="#"><span class="label label-default text-uppercase"><span class="icon-tag"></span> Design Studio</span></a>
                            <a href="#"><span class="label label-default text-uppercase"><span class="icon-time"></span> 1 Hour Ago</span></a>
                          </p>
                        </article>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-md-push-6 p-l-0">
                        <figure class="has-light-mask m-b-0 image-effect">
                          <img src="https://images.unsplash.com/photo-1434394673726-e8232a5903b4?q=80&fm=jpg&w=1080&fit=max" alt="Article thumbnail" class="img-fluid">
                        </figure>
                      </div>
                      <div class="col-md-6 col-md-pull-6 p-r-0">
                        <article class="center-block">
                          <span class="label label-info">Featured article</span>
                          <br>
                          <h5><a href="#">How bold, emotive imagery can connect with your audience <span class="icon-arrow-right"></span></a></h5>
                          <p class="m-b-0">
                            <a href="#"><span class="label label-default text-uppercase"><span class="icon-tag"></span> Design Studio</span></a>
                            <a href="#"><span class="label label-default text-uppercase"><span class="icon-time"></span> 1 Hour Ago</span></a>
                          </p>
                        </article>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
           --}}

              <!-- Sign Up
              ================================================== -->
              <section class="section-signup bg-faded">
                <div class="container">
                  <h3 class="text-xs-center m-b-3">{{__("welcome.sign_up.title")}}</h3>
                  <div style="width:100%;text-align:center;">
                    <a class="btn btn-secondary-outline m-b-1" href="/login" role="button"></span>{{__("welcome.login")}}</a>
                    <a class="btn btn-secondary-outline m-b-1 m-l-1" href="/register" role="button"></span>{{__("welcome.register")}}</a>
                </div>
                </div>
              </section>
          
              <!-- Footer
              ================================================== -->
          
                    <footer class="page-footer bg-inverse">

                            <!-- Copyright -->
                            <div class="footer-copyright " style="text-align:center;padding:15px 0;">© 2019 Copyright:
                                <a style="color:red;" href="TheNoche.com"> TheNoche</a>
                            </div>
                            <!-- Copyright -->
                
                        </footer>
          
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
              <script src="welcome/js/landio.min.js"></script>
</body>

</html>
