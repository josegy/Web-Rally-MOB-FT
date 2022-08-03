<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta id="vp" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>MOB FT 2022 - Rally</title>
    <link rel="shortcut icon" href="{{ asset('template/assets/img/logoMOB.png') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/custom.css') }}">
    <script src="../js/app.js"></script>

    {{-- CDN Owl Carousel --}}
    <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CDN Owl Carousel --}}
    <link rel="stylesheet"
        src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="content-wrapper">
        {{-- Navbar --}}
        <header class="wrapper bg-soft-primary">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light pt-5">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="#">
                            <h2 class="m-0">MOB FT 2022</h2>
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <a href="#"><img src="./assets/img/logo-light.png"
                                    srcset="./assets/img/logo-light@2x.png 2x" alt="" /></a>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="navbar-other w-100 d-flex ms-auto">
                        <ul class="navbar-nav flex-row align-items-center ms-auto justify-content-end">
                            <li class="nav-item dropdown language-select">
                                {{-- <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a> --}}
                                <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nama Dealer</a>

                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        {{-- <a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a> --}}
                                        <a href="{{ route('logout') }}" class="dropdown-item text-danger">Keluar</a>

                                        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                            </form> --}}
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        {{-- End Navbar --}}
    </div>

    <div class="container pt-10 pt-md-14">
        <div class="card">
            <div class="card-header">
                <h1>HAPUS KARTU</h1>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <h3>Nama Tim : </h3>
                    </div>

                    {{-- Select Nama Tim --}}
                    <div class="col-auto">
                        <select class="form-select" name="teamName" id="">
                            @for ($x = 0; $x < count($pemain); $x++)
                                <option value="{{ $pemain[$x]->id }}">{{ str_replace('_', ' ', $pemain[$x]->name) }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row align-item-center">
                    <div class="col-auto">
                        <h3>Kartu Dimiliki : </h3>
                    </div>

                    {{-- Carousel Tampil Kartu --}}
                    <div class="col-auto">
                        <div id="listUtuh" class="owl-carousel owl-theme">
                            <div class="form-check">
                                <div class="item">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Kartu Wajik 11</label>
                                    <img src="{{ asset('/asset/img/kartu-bridge-custom-wajik-11.png') }}"
                                        class="card-img-top">
                                </div>
                            </div>
                            <div class="item">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Kartu Wajik 11</label>
                                <img src="{{ asset('/asset/img/kartu-bridge-custom-wajik-11.png') }}"
                                    class="card-img-top">
                            </div>
                            <div class="item">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Kartu Wajik 11</label>
                                <img src="{{ asset('/asset/img/kartu-bridge-custom-wajik-11.png') }}"
                                    class="card-img-top">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-2">
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#confirmHapus">HAPUS</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus --}}
    <div class="modal fade" id="confirmHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="notifLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                    Apakah Anda Yakin Ingin Menghapus Kartu :
                    <ul>
                        <li>Kartu Wajik 11</li>
                        <li>Kartu Wajik 12</li>
                        <li>Kartu Wajik 13</li>
                        <li>Kartu Wajik 14</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Hapus</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Notif Tukar --}}
    <div class="modal fade" id="notifHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="notifLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Notif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                    {{-- Muncul notif hapus/batal kartu disini --}}

                    {{-- <span id="hasilHapus"><h4>Kartu <b>BERHASIL</b> Dihapus</h4></span>
                    <span id="hasilHapus"><h4>Kartu <b>BATAL</b> Dihapus</h4></span> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK!</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-grape text-white mt-5 mt-md-16">
        <div class="container text-center py-5 fs-18">
            <p>Developed by Information Technology Department MOB FT 2022</p>
            <p>© 2022 MOB FT 2022. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('template/assets/js/theme.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/owl.carousel.min.js') }}"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                }
            }
        });

        $('#teamName').change(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('dealer.change') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': $(this).val()
                },
                success: function(data) {
                    // alert('success');

                    $('#listUtuh').empty();
                    $.each(data.utuh, function(key, value) {
                        $('#listUtuh').append(
                            `<img src="{{ asset('/asset/img/${data.utuh[key].gambar}.png') }}" class="card-img-top">`
                        );
                    })

                    // $.each(data.utuh, function(key, value) {
                    //     $("#listUtuh").trigger('remove.owl.carousel', [key]).trigger(
                    //         'refresh.owl.carousel');
                    // })

                    // $.each(data.utuh, function(key, value) {
                    //     $('#listUtuh')
                    //         .trigger('add.owl.carousel', [
                    //             `<div class="item">
                //             <div class="card border-0 shadow ">
                //                 <img src="{{ asset('/asset/img/${data.utuh[key].gambar}.png') }}" class="card-img-top">
                //             </div>
                //             <h6>${data.utuh[key].namaKartu.replace('_', ' ')}</h6>
                //         </div>`
                    //         ]).trigger('refresh.owl.carousel');
                    // })

                    // $.each(data.potongan, function(key, value) {
                    //     $("#listPotongan").trigger('remove.owl.carousel', [key]).trigger(
                    //         'refresh.owl.carousel');
                    // })

                    // $.each(data.potongan, function(key, value) {
                    //     $('#listPotongan')
                    //         .trigger('add.owl.carousel', [
                    //             `<div class="item">
                //                 <div class="card border-0 shadow ">
                //                     <img src="{{ asset('/asset/img/${data.potongan[key].gambar}.png') }}" class="card-img-top kartu-potongan">
                //                 </div>
                //                 <h6>${data.potongan[key].namaKartu.replace('_', ' ')}</h6>
                //             </div>`
                    //         ]).trigger('refresh.owl.carousel');
                    // })
                },
                error: function() {
                    alert('error');
                }
            })
        })
    </script>
</body>

</html>
