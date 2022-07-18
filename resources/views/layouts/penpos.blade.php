<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta id="vp" name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
  <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
  <meta name="author" content="elemis">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>MOB FT 2022 Rally - Penpos</title>
  <link rel="shortcut icon" href="{{ asset('template/assets/img/logoMob.png') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/css/plugins.css') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/css/custom.css') }}">
</head>

<body>
  <div class="content-wrapper">
    {{-- Navbar --}}
    <header class="wrapper bg-soft-primary">
      <nav class="navbar navbar-expand-lg center-nav transparent navbar-light pt-5">
          <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100">
              <a href="#">
                <img src="{{ asset('template/assets/img/logo-dark.png ')}}" srcset="./assets/img/logo-dark@2x.png 2x" alt="" />
              </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
              <div class="offcanvas-header d-lg-none">
                <a href="#"><img src="./assets/img/logo-light.png" srcset="./assets/img/logo-light@2x.png 2x" alt="" /></a>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
            </div>
            <div class="navbar-other w-100 d-flex ms-auto">
              <ul class="navbar-nav flex-row align-items-center ms-auto justify-content-end">
                <li class="nav-item dropdown language-select">
                  <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
    
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </header>
    {{-- End Navbar --}}
  
    @yield('penpos_content')
  </div>

  <!-- /.content-wrapper -->
  <footer class="bg-grape text-white mt-5 mt-md-16">
    <div class="container text-center py-5 fs-18">
      <p>Developed by Information Technology Department MOB FT 2022</p>
      <p>© 2022 MOB FT 2022. All Rights Reserved.</p>
    </div>
  </footer>
  <script src="{{ asset('template/assets/js/theme.js') }}"></script>
  <script src="{{ asset('template/assets/js/plugins.js') }}"></script>
  @yield('penpos_script')
  <script>
    function cekPosSingle() {
      $('#cekPos').attr('disabled', true);
        $.ajax({
          type: 'POST',
          url: "{{ route('penpos.cekPosSingle') }}",
          data:{
              '_token': '<?php echo csrf_token(); ?>',
              'pemain1_id': $('#pemain_id').val(),
          },
          success: function (data) {
            if (data.status != "error"){
              //Update status pos di dashboard
              $('#status_pos').html(data.penpos.status);
              //Hapus disabled pada button menang/kalah
              $('#btn_menang').attr('disabled',false);
              $('#btn_kalah').attr('disabled',false);
              
              // Kunci dropdown listnya 
              $('#pemain_id').attr('disabled', true);
            }
            else{
              alert(data.msg);
              $('#cekPos').attr('disabled', false);
            }
          }
      });
    }

    function resultGame($hasil) {
      let pemain_click = $('#pemain_id').val();

      $.ajax({
          type: 'POST',
          url: "{{ route('penpos.resultGame') }}",
          data:{
              '_token': '<?php echo csrf_token(); ?>',
              'pemain1_id': pemain_click,
              'status_game': $hasil,
          },
          success: function (data) {
            if (data.status != "error"){
              //Update dropdown box nya
              var option_pemain = `<option value="" hidden selected>-- Pilih Nama Pemain --</option>`;
              $.each(data.all_pemain, (key, pemain) => {
                option_pemain += `<option value=${pemain.id}>${pemain.name}</option>`;
              });
              $('#pemain_id').html(option_pemain);

              // Buka kunci drop downnya
              $('#pemain_id').attr('disabled', false);
              
              //Kunci button menang kalah
              $('#btn_menang').attr('disabled',true);
              $('#btn_kalah').attr('disabled',true);

              //Perbaruhi status penposnya
              $('#status_pos').html(data.penpos.status);
            }
            else{
              alert(data.msg);
            }
            // Buka kunci pada button cek
            $('#cekPos').attr('disabled', false);
          }
      });

    }
    </script>
</body>

</html>