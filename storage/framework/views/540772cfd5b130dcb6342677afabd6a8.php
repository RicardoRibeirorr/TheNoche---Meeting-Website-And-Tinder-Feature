<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="hy92HCe5AWDiOm-hQrooUk9H04oWQRG-wqPR-0p7UEE" />
    <script data-ad-client="ca-pub-3649473809837620" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
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
                        <a class="nav-link" href="/login" ><?php echo e(__("nav.session.login")); ?></a>
                      </li>
                      <li class="nav-item nav-item-toggable">
                        <a class="nav-link" href="/register" ><?php echo e(__("nav.session.register")); ?></a>
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
                  <h2 class="m-b-3"> <?php echo __("welcome.hero.slogan",["name"=>'<em class="font-family-pacific text-red">TheNoche</em>']); ?></h2>
                  <a class="btn btn-secondary-outline m-b-1" href="/login" role="button"></span><?php echo e(__("welcome.login")); ?></a>
                  <a class="btn btn-secondary-outline m-b-1 m-l-1" href="/register" role="button"></span><?php echo e(__("welcome.register")); ?></a>
                  <ul class="nav nav-inline social-share">
                    <li class="nav-item"><span><span class="icon-user"></span> <?php echo e(__("welcome.hero.user_count")); ?></span></li>
                    <li class="nav-item"><span><span class="icon-heart"></span> <?php echo e(__("welcome.hero.relation_count")); ?></span></li>
                    <li class="nav-item"><span><span class="icon-thunderbolt"></span> <?php echo e(__("welcome.hero.event_count")); ?></span></li>
                  </ul>
                </div>
              </header>
          
              <!-- Intro
              ================================================== -->
          
              <section class="section-intro bg-faded text-xs-center">
                <div class="container">
                  <h3 class="wp wp-1"><?php echo e(__("welcome.intro.title")); ?></h3>
                  <p class="lead wp wp-2"><?php echo __("welcome.intro.subtitle",["name"=>"<em class='font-family-pacific text-red'>TheNoche</em>"]); ?></p>
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
                              <h4 class="card-title" style="font-size:1.5rem;"><?php echo e(__("welcome.feature.social.title")); ?></h4>
                              <h6 class="card-subtitle text-muted"><?php echo e(__("welcome.feature.social.subtitle")); ?></h6>
                              <p class="card-text"><?php echo e(__("welcome.feature.social.description")); ?></p>
                            </div>
                          </div>
                        </div>
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-block">
                          <span class="icon-search display-1"></span>
                          <h4 class="card-title" style="font-size:1.5rem;"><?php echo e(__("welcome.feature.explore.title")); ?></h4>
                          <h6 class="card-subtitle text-muted"><?php echo e(__("welcome.feature.explore.subtitle")); ?></h6>
                          <p class="card-text"><?php echo e(__("welcome.feature.explore.description")); ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-block">
                          <span class="icon-thunderbolt display-1"></span>
                          <h4 class="card-title" style="font-size:1.5rem;"><?php echo e(__("welcome.feature.post.title")); ?></h4>
                          <h6 class="card-subtitle text-muted"><?php echo e(__("welcome.feature.post.subtitle")); ?></h6>
                          <p class="card-text"><?php echo e(__("welcome.feature.post.description")); ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

          
              
          
              <!-- Testimonials
              ================================================== -->

              <!-- Text Content
              ================================================== -->
              <section class="section-text bg-inverse ">
                <div class="container ">
                  <h3 class="text-xs-center"><?php echo __("welcome.about.title",["name"=>"<em class='font-family-pacific text-red'>TheNoche</em>"]); ?></h3>
                  <div class="row p-y-3">
                    <div class="col-md-5">
                      <p class="wp wp-7"><?php echo e(__("welcome.about.resume")); ?></p>
                    </div>
                    <div class="col-md-5 col-md-offset-2 separator-x">
                      <p class="wp wp-8"><?php echo e(__("welcome.about.user")); ?></p>
                    </div>
                  </div>
                </div>
              </section>

          
              

              <!-- Sign Up
              ================================================== -->
              <section class="section-signup bg-faded">
                <div class="container">
                  <h3 class="text-xs-center m-b-3"><?php echo e(__("welcome.sign_up.title")); ?></h3>
                  <div style="width:100%;text-align:center;">
                    <a class="btn btn-secondary-outline m-b-1" href="/login" role="button"></span><?php echo e(__("welcome.login")); ?></a>
                    <a class="btn btn-secondary-outline m-b-1 m-l-1" href="/register" role="button"></span><?php echo e(__("welcome.register")); ?></a>
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
<?php /**PATH C:\Users\RicRib\Desktop\Projects\Fiesta\TheNoche\resources\views/welcome.blade.php ENDPATH**/ ?>