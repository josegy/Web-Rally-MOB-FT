<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta id="vp" name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
  <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
  <meta name="author" content="elemis">
  <title>Sandbox - Modern & Multipurpose Bootstrap 5 Template</title>
  <link rel="shortcut icon" href="{{ asset('template/assets/img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/css/plugins.css') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/css/custom.css') }}">
</head>

<body>
  <div class="content-wrapper">
    <header class="wrapper bg-soft-primary">
        <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
            <div class="container flex-lg-row flex-nowrap align-items-center">
              <div class="navbar-brand w-100">
                <a href="./index.html">
                  <img src="{{ asset('template/assets/img/logo-dark.png ')}}" srcset="./assets/img/logo-dark@2x.png 2x" alt="" />
                </a>
              </div>
              <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div class="offcanvas-header d-lg-none">
                  <a href="./index.html"><img src="./assets/img/logo-light.png" srcset="./assets/img/logo-light@2x.png 2x" alt="" /></a>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
              </div>
              <!-- /.navbar-collapse -->
              <div class="navbar-other w-100 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                  <li class="nav-item dropdown language-select">
                    <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nama Admin</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a class="dropdown-item" href="#">Keluar</a></li>
                    </ul>
                  </li>
                </ul>
                <!-- /.navbar-nav -->
              </div>
              <!-- /.navbar-other -->
            </div>
            <!-- /.container -->
          </nav>
          <!-- /.navbar -->
      <!-- /.navbar -->

      <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-15 pt-md-14 pb-md-20 text-center">
            <div class="card">
                <div class="card-header">
                  <h1>Nama Pos</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-end pt-2">
                                    <label> <h3>Nama Tim 1 :</h3></label>
                                </div>
                                <div class="col-md-5">
                                    <select name="namaTim" class="form-select" required>
                                        <option value="" hidden>Pilih Tim</option>
                                        <option value="Tim1">Tim 1</option>
                                        <option value="Tim2">Tim 2</option>
                                        <option value="Tim3">Tim 3</option>
                                    </select>
                                </div>
                                <div class="col-md-3 text-start">
                                    <form action="">
                                        <button type="button" class="btn btn-success" name="btnCheck1">Check</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-end pt-2">
                                    <label> <h3>Nama Tim 2 :</h3></label>
                                </div>
                                <div class="col-md-5">
                                    <select name="namaTim" class="form-select" required>
                                        <option value="" hidden>Pilih Tim</option>
                                        <option value="Tim1">Tim 1</option>
                                        <option value="Tim2">Tim 2</option>
                                        <option value="Tim3">Tim 3</option>
                                    </select>
                                </div>
                                <div class="col-md-3 text-start">
                                    <form action="">
                                        <button type="button" class="btn btn-success" name="btnCheck2">Check</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <form action="" method="GET">
                            <button type="button" class="btn btn-primary" name="btnMenang">Menang</button>
                            <button type="button" class="btn btn-danger" name="btnKalah">Kalah</button>
                            <button type="button" class="btn btn-warning" name="btnSeri">Seri</button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card-footer text-muted pos-penuh">
                    <span class="font-color">Status Pos</span>
                </div>
            </div>
        </div>
        <!-- /column -->

      <div class="modal fade" id="modal-signin" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content text-center">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <h2 class="mb-3 text-start">Welcome Back</h2>
              <p class="lead mb-6 text-start">Fill your email and password to sign in.</p>
              <form class="text-start mb-3">
                <div class="form-floating mb-4">
                  <input type="email" class="form-control" placeholder="Email" id="loginEmail">
                  <label for="loginEmail">Email</label>
                </div>
                <div class="form-floating password-field mb-4">
                  <input type="password" class="form-control" placeholder="Password" id="loginPassword">
                  <span class="password-toggle"><i class="uil uil-eye"></i></span>
                  <label for="loginPassword">Password</label>
                </div>
                <a class="btn btn-primary rounded-pill btn-login w-100 mb-2">Sign In</a>
              </form>
              <!-- /form -->
              <p class="mb-1"><a href="#" class="hover">Forgot Password?</a></p>
              <p class="mb-0">Don't have an account? <a href="#" data-bs-target="#modal-signup" data-bs-toggle="modal" data-bs-dismiss="modal" class="hover">Sign up</a></p>
              <div class="divider-icon my-4">or</div>
              <nav class="nav social justify-content-center text-center">
                <a href="#" class="btn btn-circle btn-sm btn-google"><i class="uil uil-google"></i></a>
                <a href="#" class="btn btn-circle btn-sm btn-facebook-f"><i class="uil uil-facebook-f"></i></a>
                <a href="#" class="btn btn-circle btn-sm btn-twitter"><i class="uil uil-twitter"></i></a>
              </nav>
              <!--/.social -->
            </div>
            <!--/.modal-content -->
          </div>
          <!--/.modal-body -->
        </div>
        <!--/.modal-dialog -->
      </div>
      <!--/.modal -->
      <div class="modal fade" id="modal-signup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content text-center">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <h2 class="mb-3 text-start">Sign up to Sandbox</h2>
              <p class="lead mb-6 text-start">Registration takes less than a minute.</p>
              <form class="text-start mb-3">
                <div class="form-floating mb-4">
                  <input type="text" class="form-control" placeholder="Name" id="loginName">
                  <label for="loginName">Name</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="email" class="form-control" placeholder="Email" id="loginEmail">
                  <label for="loginEmail">Email</label>
                </div>
                <div class="form-floating password-field mb-4">
                  <input type="password" class="form-control" placeholder="Password" id="loginPassword">
                  <span class="password-toggle"><i class="uil uil-eye"></i></span>
                  <label for="loginPassword">Password</label>
                </div>
                <div class="form-floating password-field mb-4">
                  <input type="password" class="form-control" placeholder="Confirm Password" id="loginPasswordConfirm">
                  <span class="password-toggle"><i class="uil uil-eye"></i></span>
                  <label for="loginPasswordConfirm">Confirm Password</label>
                </div>
                <a class="btn btn-primary rounded-pill btn-login w-100 mb-2">Sign Up</a>
              </form>
              <!-- /form -->
              <p class="mb-0">Already have an account? <a href="#" data-bs-target="#modal-signin" data-bs-toggle="modal" data-bs-dismiss="modal" class="hover">Sign in</a></p>
              <div class="divider-icon my-4">or</div>
              <nav class="nav social justify-content-center text-center">
                <a href="#" class="btn btn-circle btn-sm btn-google"><i class="uil uil-google"></i></a>
                <a href="#" class="btn btn-circle btn-sm btn-facebook-f"><i class="uil uil-facebook-f"></i></a>
                <a href="#" class="btn btn-circle btn-sm btn-twitter"><i class="uil uil-twitter"></i></a>
              </nav>
              <!--/.social -->
            </div>
            <!--/.modal-content -->
          </div>
          <!--/.modal-body -->
        </div>
        <!--/.modal-dialog -->
      </div>
      <!--/.modal -->
    </header>
    <!-- /header -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="bg-dark text-inverse mt-5 mt-md-16">
    <div class="container py-13 py-md-15">
      <div class="row gy-6 gy-lg-0">
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <img class="mb-4" src="./assets/img/logo-light.png" srcset="./assets/img/logo-light@2x.png 2x" alt="" />
            <p class="mb-4">© 2022 Sandbox. <br class="d-none d-lg-block" />All rights reserved.</p>
            <nav class="nav social social-white">
              <a href="#"><i class="uil uil-twitter"></i></a>
              <a href="#"><i class="uil uil-facebook-f"></i></a>
              <a href="#"><i class="uil uil-dribbble"></i></a>
              <a href="#"><i class="uil uil-instagram"></i></a>
              <a href="#"><i class="uil uil-youtube"></i></a>
            </nav>
            <!-- /.social -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title text-white mb-3">Get in Touch</h4>
            <address class="pe-xl-15 pe-xxl-17">Moonshine St. 14/05 Light City, London, United Kingdom</address>
            <a href="mailto:#">info@email.com</a><br /> 00 (123) 456 78 90
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title text-white mb-3">Learn More</h4>
            <ul class="list-unstyled  mb-0">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Our Story</a></li>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-12 col-lg-3">
          <div class="widget">
            <h4 class="widget-title text-white mb-3">Our Newsletter</h4>
            <p class="mb-5">Subscribe to our newsletter to get our news & deals delivered to you.</p>
            <div class="newsletter-wrapper">
              <!-- Begin Mailchimp Signup Form -->
              <div id="mc_embed_signup2">
                <form action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate dark-fields" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll2">
                    <div class="mc-field-group input-group form-floating">
                      <input type="email" value="" name="EMAIL" class="required email form-control" placeholder="Email Address" id="mce-EMAIL2">
                      <label for="mce-EMAIL2">Email Address</label>
                      <input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-primary ">
                    </div>
                    <div id="mce-responses2" class="clear">
                      <div class="response" id="mce-error-response2" style="display:none"></div>
                      <div class="response" id="mce-success-response2" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value=""></div>
                    <div class="clear"></div>
                  </div>
                </form>
              </div>
              <!--End mc_embed_signup-->
            </div>
            <!-- /.newsletter-wrapper -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </footer>
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="{{ asset('template/assets/js/theme.js') }}"></script>
  <script src="{{ asset('template/assets/js/plugins.js') }}"></script>
  <script>
    window.onload = function() {
        if (screen.width < 1000) {
            var mvp = document.getElementById('vp');
            mvp.setAttribute('content','user-scalable=no,width=1000');
        }
    }
    </script>
</body>

</html>