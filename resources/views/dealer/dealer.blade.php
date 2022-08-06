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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CDN Owl Carousel --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
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
                            <img src="{{ asset('asset/img/MOB FT 2022.svg') }}" alt="" />
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
                <h1 style="text-align: center">HAPUS KARTU</h1>
            </div>
            <div class="card-body">
                <div class="row align-items-center justify-content-center">
                    <div class="col-auto">
                        <h3>Nama Tim : </h3>
                    </div>

                    {{-- Select Nama Tim --}}
                    <div class="col-auto">
                        <select class="form-select" name="teamName" id="teamName">
                            <option value="pilih" hidden>-- Pilih Nama Pemain --</option>
                            @for ($x = 0; $x < count($pemain); $x++)
                                <option value="{{ $pemain[$x]->id }}">{{ str_replace('_', ' ', $pemain[$x]->name) }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body border-top border-1">
                <div class="row align-items-center justify-content-center">
                    <div class="col-auto mb-4">
                        <h2>KARTU DIMILIKI</h2>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center mb-6">
                    {{-- Carousel Tampil Kartu --}}
                    <div class="col">
                        <div id="listUtuh" class="owl-carousel owl-theme">
                            {{-- @for ($x = 0; $x < count($kartu); $x++)
                                <div class="item">
                                    <img src="{{ asset('/asset/img/' . $kartu[$x]->gambar . '.png') }}"
                                        class="card-img-top">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    {{ str_replace('_', ' ', $kartu[$x]->namaKartu) }}
                                </div>
                            @endfor --}}
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-3">
                    <div class="row align-items-center">
                        <button id="btnHapus" class="btn" data-bs-toggle="modal" data-bs-target="#confirmHapus"
                            style="background-color: red; color: white">HAPUS</button>
                    </div>
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
                    <ul id="listHapus">
                        {{-- kosong --}}
                    </ul>
                </div>
                <div class="modal-footer">
                    <button id="konfirmasiHapus" type="button" class="btn btn-success"
                        data-bs-dismiss="modal">Hapus</button>
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
                    <span id="hasilHapus"></span>
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
                    items: 4
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

                    let panjang = $('.item').length;
                    for (let i = 0; i < panjang; i++) {
                        $("#listUtuh").trigger('remove.owl.carousel', [i]).trigger(
                            'refresh.owl.carousel');
                    }

                    $.each(data.utuh, function(key, value) {
                        $('#listUtuh')
                            .trigger('add.owl.carousel', [
                                `<div class="item">
                                    <img src="{{ asset('/asset/img/${data.utuh[key].gambar}.png') }}"
                                    class="card-img-top">
                                    <input class="form-check-input" type="checkbox" value="${data.utuh[key].namaKartu}" id="check_${key}">
                                    ${data.utuh[key].namaKartu.replace('_', ' ')}
                                    </div>`
                            ]).trigger('refresh.owl.carousel');
                    })
                },
                error: function() {
                    alert('error');
                }
            })
        })

        let arrCard = [];
        $('#btnHapus').click(function() {
            arrCard = [];
            $('#listHapus').empty();

            let panjang = $('.item').length;
            for (let x = 0; x < panjang; x++) {
                let isChecked = $('#check_' + x).prop('checked');
                if (isChecked) {
                    arrCard.push($('#check_' + x).prop('value'));
                    $('#listHapus').append(`<li>Kartu ${$('#check_' + x).prop('value').replace('_',' ')}</li>`);
                }
            }
        })

        $('#konfirmasiHapus').click(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('dealer.hapus') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'teamID': $('#teamName').val(),
                    'arrCard': arrCard
                },
                success: function(data) {
                    // alert('success');
                    if (data.msg == 'Mohon pilih team terlebih dahulu!!!') {
                        $('#hasilHapus').html(data.msg);

                    } else if (data.msg == 'Kartu berhasil dihapus!') {
                        $('#hasilHapus').html(`Kartu <b>BERHASIL</b> dihapus`);

                    } else {
                        $('#hasilHapus').html(`Maaf ada kesalahan teknis`);
                    }

                    $('#notifHapus').modal('show');

                    let panjang = $('.item').length;
                    for (let i = 0; i < panjang; i++) {
                        $("#listUtuh").trigger('remove.owl.carousel', [i]).trigger(
                            'refresh.owl.carousel');
                    }

                    $.each(data.kartu, function(key, value) {
                        $('#listUtuh')
                            .trigger('add.owl.carousel', [
                                `<div class="item">
                                    <img src="{{ asset('/asset/img/${data.kartu[key].gambar}.png') }}"
                                        class="card-img-top">
                                    <input class="form-check-input" type="checkbox" value="${data.kartu[key].namaKartu}" id="check_${key}">
                                    ${data.kartu[key].namaKartu.replace('_', ' ')}
                                </div>`
                            ]).trigger('refresh.owl.carousel');
                    })
                },
                error: function() {
                    alert('error');
                }
            })
        })
    </script>
</body>

</html>
