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
    <title>MOB FT 2022 Rally</title>
    <link rel="shortcut icon" href="{{ asset('template/assets/img/logoMob.png') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/custom.css') }}">
    <script src="../js/app.js"></script>
    {{-- <link rel="preload" href="{{ asset('template/assets/css/fonts/thicccboi.css') }}" as="style" onload="this.rel='stylesheet'"> --}}

    {{-- CDN ??? --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CDN ??? --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CDN ??? --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
    <div class="content-wrapper">
        {{-- Navbar --}}
        <header class="wrapper bg-soft-primary">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light py-5">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="#">
                            <img src="{{ asset('template/assets/img/logo-dark.png ') }}"
                                srcset="./assets/img/logo-dark@2x.png 2x" alt="" />
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
                                <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ $user->name }}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
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
    </div>

    <section class="wrapper bg-soft-primary text-center" style="overflow: auto">
        <h2 class="fs-44">MAP RALLY</h2>
        <img src="{{ asset('asset/img/FakultasTeknik(Isometric)-01.png') }}" alt="Map" usemap="#image-map"
            width="1200" />

        {{-- <map name="image-map">
		<area class="btn btn-circle btn-purple uil uil-map-marker" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" title="TA" data-bs-content="Top popover" coords="647,618,11" shape="circle"/>
		<area class="btn btn-circle btn-purple uil uil-map-marker" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" title="Sample Title" data-bs-content="Top popover" coords="332,517,11" shape="circle"/>
		<area class="btn btn-circle btn-purple uil uil-map-marker" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" title="Sample Title" data-bs-content="Top popover" coords="531,391,11" shape="circle"/>
		<area class="btn btn-circle btn-purple uil uil-map-marker" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" title="Sample Title" data-bs-content="Top popover" coords="738,390,11" shape="circle"/>
		</map> --}}

        <map name="image-map">
            <area target="_blank" alt="Tugu Teknik" title="Tugu Teknik" href="https://www.google.com"
                coords="647,618,11" shape="circle" />
            <area target="_blank" alt="PAJ" title="PAJ" href="https://www.google.com" coords="332,517,11"
                shape="circle" />
            <area target="_blank" alt="Lorong TF" title="Lorong TF" href="https://www.google.com" coords="531,391,11"
                shape="circle" />
            <area target="_blank" alt="Boulevard" title="Boulevard" href="https://www.google.com" coords="738,390,11"
                shape="circle" style="width: 10px; height: 10px; background-color:black; border-radius: 10px;" />
        </map>
        {{-- <button type="button" id="tukarKartu" class="btn btn-primary rounded-pill mt-5" tabindex="0">Redeem
            Card</button> --}}
    </section>

    {{-- Modal Kartu --}}
    <div class="modal fade" id="modal-02" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-3">
                        <h3>Kartu Utuh</h3>
                        <div id="listUtuh" class="owl-carousel owl-theme mt-2">
                            @for ($x = 0; $x < count($utuh); $x++)
                                <div class="item">
                                    <div class="card border-0 shadow">
                                        <img src="{{ asset('/asset/img/' . $utuh[$x]->gambar . '.png') }}"
                                            class="card-img-top">
                                    </div>
                                    <h6>{{ str_replace('_', ' ', $utuh[$x]->namaKartu) }}</h6>
                                </div>
                            @endfor
                        </div>
                        <hr class="my-8">
                        <h3>Kartu Pecahan</h3>
                        <div id="listPotongan" class="owl-carousel owl-theme mt-2">
                            @for ($x = 0; $x < count($potongan); $x++)
                                <div class="item">
                                    <div class="card border-0 shadow ">
                                        <img src="{{ asset('/asset/img/' . $potongan[$x]->gambar . '.png') }}"
                                            class="card-img-top kartu-potongan">
                                    </div>
                                    <h6>{{ str_replace('_', ' ', $potongan[$x]->namaKartu) }}</h6>
                                </div>
                            @endfor
                            <!-- item ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Kartu --}}

    {{-- Modal Mekanisme --}}
    <div class="modal fade" id="modal-03" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body" style="text-align: justify">
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h3 class="text-center">Mekanisme Penukaran Kartu</h3>
                    <div>
                        <ol>
                            <li>Potongan kartu dapat ditukarkan pada Menu 'Tukar Kartu'.</li>
                            <li>Potongan kartu yang diperoleh dapat ditukarkan dengan kartu acak apabila tim menukarkan
                                dengan
                                3 potongan kartu. Kartu yang ditukarkan juga dapat dipilih (angka dan simbol) apabila
                                tim menukarkan dengan
                                5 potongan kartu.</li>
                            <li>Apabila ada kartu yang tidak diinginkan, kartu dapat ditukarkan menggunakan “penukaran
                                spesial”. Setiap tim hanya memiliki kesempatan “penukaran spesial” sebanyak 1 kali.
                                Tim dapat memilih salah satu dari angka maupun simbol yang diinginkan (contoh: ingin
                                menukarkan
                                berdasarkan angka atau ingin menukarkan berdasarkan simbol) dengan menukarkan 1 kartu
                                utuh yang tidak diinginkan
                                dan 1 potongan kartu.</li>
                        </ol>
                    </div>
                    <h3 class="text-center">Selamat Bermain</h3>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Mekanisme --}}

    {{-- Modal Konfirmasi Tukar --}}
    <div class="modal fade" id="tukar" tabindex="-1" aria-labelledby="tukarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h3 class="modal-title mb-5" id="tukarLabel">Tukar Kartu</h3>
                    <button id="random" class="btn btn-primary" data-bs-dismiss="modal">Random</button>
                    <button id="pilih" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#choose">Pilih</button>
                    <button id="spesial" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#special">Spesial</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Notif Tukar --}}
    <div class="modal fade" id="notif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="notifLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notifLabel">Notif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                    Kartu berhasil ditukarkan!! kamu mendapat kartu <b><span id="detailKartu"></span></b>
                </div>
                <div class="modal-footer">
                    {{-- button ok --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK!</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Pilihan --}}
    <div class="modal fade" id="choose" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="chooseLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chooseLabel">Choose</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                    <select id="chooseCard">
                        @for ($y = 0; $y < count($kartu); $y++)
                            <option value="{{ $kartu[$y]->namaKartu }}">
                                {{ str_replace('_', ' ', $kartu[$y]->namaKartu) }}</option>
                        @endfor
                    </select>

                </div>
                <div class="modal-footer">
                    {{-- button confirm --}}
                    <button id="konfirmasi_pilihan" type="button" class="btn btn-success"
                        data-bs-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Spesial --}}
    <div class="modal fade" id="special" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="specialLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="specialLabel">Choose</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                    <h5>Pilih Kartu:</h5>
                    <select id="selectKartu"> </select><br><br>
                    <h5>Pilih Jenis:</h5>
                    <select id="jenis">
                        <option value="angka">Angka</option>
                        <option value="simbol">Simbol</option>
                    </select>
                    <select id="specialCard">
                        @for ($z = 6; $z <= 10; $z++)
                            <option value="{{ $z }}">{{ $z }}</option>
                        @endfor
                    </select>
                </div>
                <div class="modal-footer">
                    {{-- button confirm --}}
                    <button id="konfirmasi_spesial" type="button" class="btn btn-success"
                        data-bs-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="fab-container">
        <div class="fab fab-icon-holder">
            <i class="uil uil-question fs-42"></i>
        </div>

        <ul class="fab-options">
            <li>
                <span class="fab-label">Tukar Kartu</span>
                <div class="fab-icon-holder">
                    <i>
                        <button type="button" id="tukarKartu" style="border: none; background-color: transparent"><i
                                class="uil uil-exchange fs-24"></i></button>
                    </i>
                </div>
            </li>
            <li>
                <span class="fab-label">Kartu Terkumpul</span>
                <div class="fab-icon-holder">
                    <i>
                        <a href="#" class="" style="color: white" data-bs-toggle="modal"
                            data-bs-target="#modal-02">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-suit-spade-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.184 11.246A3.5 3.5 0 0 1 1 9c0-1.602 1.14-2.633 2.66-4.008C4.986 3.792 6.602 2.33 8 0c1.398 2.33 3.014 3.792 4.34 4.992C13.86 6.367 15 7.398 15 9a3.5 3.5 0 0 1-6.184 2.246 19.92 19.92 0 0 0 1.582 2.907c.231.35-.02.847-.438.847H6.04c-.419 0-.67-.497-.438-.847a19.919 19.919 0 0 0 1.582-2.907z" />
                            </svg>
                        </a>
                    </i>
                </div>
            </li>
            <li>
                <span class="fab-label">Mekanisme Penukaran</span>
                <div class="fab-icon-holder">
                    <i>
                        <a href="#" class="" style="color: white" data-bs-toggle="modal"
                            data-bs-target="#modal-03">
                            <i class="uil uil-info fs-26"></i>
                        </a>
                    </i>
                </div>
            </li>
        </ul>
    </div>

    <script src="{{ asset('template/assets/js/theme.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/owl.carousel.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            alert('test');
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
            })
        });

        /* Pusher */
        window.Echo.channel('penposChannel').listen('.status', (e) => {
            alert('dar');
            console.log(e);
        });

        let special = localStorage.getItem('special');
        $('#tukarKartu').click(function() {
            localStorage.removeItem('special');
            // alert($('#listUtuh').find('.owl-item').length);
            // console.log($('#listUtuh').find('.owl-item'));
            // alert($('#listPotongan').find('.owl-item').length);
            // console.log($('#listPotongan').find('.owl-item'));

            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.check.potongan') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>'
                },
                success: function(data) {
                    // alert('success');
                    let jumlahPotongan = data.jumlahPotongan;
                    let jumlahKartu = data.jumlahKartu;
                    console.log(jumlahPotongan);
                    console.log(jumlahKartu);

                    $('#selectKartu').html(data.selectKartu);

                    if (jumlahPotongan < 1) {
                        $('#spesial').prop('disabled', true);
                        $('#random').prop('disabled', true);
                        $('#pilih').prop('disabled', true);
                        console.log('masuk 1');

                    } else if (jumlahPotongan < 3) {
                        if (jumlahKartu < 1 || special == 'true') {
                            $('#spesial').prop('disabled', true);
                        }
                        $('#random').prop('disabled', true);
                        $('#pilih').prop('disabled', true);
                        console.log('masuk 3');

                    } else if (jumlahPotongan < 5) {
                        if (jumlahKartu < 1 || special == 'true') {
                            $('#spesial').prop('disabled', true);
                        }
                        $('#pilih').prop('disabled', true);
                        console.log('masuk 5');
                    }

                    if (jumlahKartu < 1 || special == 'true') {
                        $('#spesial').prop('disabled', true);
                    }

                    $('#tukar').modal('show');
                },
                error: function() {
                    alert('error');

                }
            })
        })

        // kalau button random diklik
        $('#random').click(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.tukar') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'tipe': 'random'
                },
                success: function(data) {
                    // alert('success');
                    let cardName = data.card[0].name.replace('_', ' ');
                    console.log(cardName);

                    $('#listUtuh')
                        .trigger('add.owl.carousel', [
                            `<div class="item">
                            <div class="card border-0 shadow ">
                                <img src="{{ asset('/asset/img/${data.utuh.gambar}.png') }}" class="card-img-top">
                            </div>
                            <h6>${data.utuh.namaKartu}</h6>
                        </div>`
                        ]).trigger('refresh.owl.carousel');

                    $("#listPotongan").trigger('remove.owl.carousel', [0]).trigger(
                        'refresh.owl.carousel');
                    $("#listPotongan").trigger('remove.owl.carousel', [1]).trigger(
                        'refresh.owl.carousel');
                    $("#listPotongan").trigger('remove.owl.carousel', [2]).trigger(
                        'refresh.owl.carousel');

                    $('#detailKartu').text(cardName);
                    $('#notif').modal('show');
                },
                error: function() {
                    alert('error');

                }
            })
        })

        //  kalau konfirmasi pilih diklik
        $('#konfirmasi_pilihan').click(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.tukar') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'tipe': 'pilih',
                    'pilihan': $('#chooseCard').val()
                },
                success: function(data) {
                    // alert('success');
                    let cardName = data.card[0].name.replace('_', ' ');
                    console.log(cardName);

                    $('#listUtuh')
                        .trigger('add.owl.carousel', [
                            `<div class="item">
                            <div class="card border-0 shadow ">
                                <img src="{{ asset('/asset/img/${data.utuh.gambar}.png') }}" class="card-img-top">
                            </div>
                            <h6>${data.utuh.namaKartu}</h6>
                        </div>`
                        ]).trigger('refresh.owl.carousel');

                    $("#listPotongan").trigger('remove.owl.carousel', [0]).trigger(
                        'refresh.owl.carousel');
                    $("#listPotongan").trigger('remove.owl.carousel', [1]).trigger(
                        'refresh.owl.carousel');
                    $("#listPotongan").trigger('remove.owl.carousel', [2]).trigger(
                        'refresh.owl.carousel');
                    $("#listPotongan").trigger('remove.owl.carousel', [3]).trigger(
                        'refresh.owl.carousel');
                    $("#listPotongan").trigger('remove.owl.carousel', [4]).trigger(
                        'refresh.owl.carousel');

                    $('#detailKartu').text(cardName);
                    $('#notif').modal('show');
                },
                error: function() {
                    alert('error');

                }
            })
        })

        // kalau konfirmasi spesial diklik
        $('#konfirmasi_spesial').click(function() {
            // localStorage.setItem('special', 'true');
            alert($('#selectKartu').val());
            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.tukar') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'tipe': 'spesial'
                    'kartukey': $('#selectKartu').val(),
                    'specialCard': $('#specialCard').val()
                },
                success: function(data) {
                    // alert('success');
                    console.log(data.card);
                    let cardName = data.card.name.replace('_', ' ');

                    $('#listUtuh')
                        .trigger('add.owl.carousel', [
                            `<div class="item">
                            <div class="card border-0 shadow ">
                                <img src="{{ asset('/asset/img/${data.utuh.gambar}.png') }}" class="card-img-top">
                            </div>
                            <h6>${data.utuh.namaKartu}</h6>
                        </div>`
                        ]).trigger('refresh.owl.carousel');

                    $("#listUtuh").trigger('remove.owl.carousel', [data.key]).trigger('refresh.owl.carousel');

                    $("#listPotongan").trigger('remove.owl.carousel', [0]).trigger(
                        'refresh.owl.carousel');

                    $('#detailKartu').text(cardName);
                    $('#notif').modal('show');
                },
                error: function() {
                    alert('error');

                }
            })
        })

        $('#jenis').change(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.change') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'jenis': $('#jenis').val()
                },
                success: function(data) {
                    // alert('success');
                    $('#specialCard').html(data.data);
                },
                error: function() {
                    alert('error');
                }
            })
        })
    </script>
</body>

</html>
