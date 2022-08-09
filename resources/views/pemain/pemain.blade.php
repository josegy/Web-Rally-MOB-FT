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
    {{-- <link rel="preload" href="{{ asset('template/assets/css/fonts/thicccboi.css') }}" as="style" onload="this.rel='stylesheet'"> --}}

    {{-- CDN Owl Carousel --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CDN Owl Carousel --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CDN FONT --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
    <div class="content-wrapper">
        {{-- Navbar --}}
        <header class="wrapper bg-soft-primary">
            <nav class="navbar navbar-expand-lg classic transparent navbar-light py-3">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="#">
                            <img src="{{ asset('asset/img/MOB FT 2022.svg') }}" alt="" />
                        </a>
                    </div>
                    <div class="navbar-other w-100 d-flex ms-md-auto">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
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

    <section class="wrapper bg-soft-primary pb-3">
        <div class="container">
            <h2 class="fs-44 text-center">MAP RALLY</h2>
            <div style="overflow: auto; padding-bottom: 10rem;">
                <img src="{{ asset('asset/img/peta-isometric-revisi-01(crop).png') }}" alt="Rally Map" usemap="#image-map" />

                <map name="image-map">
                    <area id="1" class='penpos' target="" alt="TF 2.3" title="TF 2.3" href=""
                        coords="527,408,9" shape="circle">
                    <area id="2" class='penpos' target="" alt="TF Lantai 1 (Depan PAJ TI)"
                        title="TF Lantai 1 (Depan PAJ TI)" href="" coords="389,488,9" shape="circle">
                    <area id="3" class='penpos' target="" alt="TF Dekat Keluwih" title="TF Dekat Keluwih"
                        href="" coords="588,368,9" shape="circle">
                    <area id="4" class='penpos' target="" alt="Kelas Gedung TB (1.1 C)"
                        title="Kelas Gedung TB (1.1 C)" href="" coords="643,507,9" shape="circle">
                    <area id="5" class='penpos' target="" alt="Taman TF" title="Taman TF"
                        href="" coords="517,455,9" shape="circle">
                    <area id="6" class='penpos' target="" alt="TE Lantai 1" title="TE Lantai 1"
                        href="" coords="637,381,9" shape="circle">
                    <area id="7" class='penpos' target="" alt="Jembatan TF dan TE"
                        title="Jembatan TF dan TE" href="" coords="565,338,9" shape="circle">
                    <area id="8" class='penpos' target="" alt="Antara Boulevard dan Gaztek"
                        title="Antara Boulevard dan Gaztek" href="" coords="656,401,9" shape="circle">
                    <area id="9" class='penpos' target="" alt="Depan TU" title="Depan TU"
                        href="" coords="528,572,9" shape="circle">
                    <area id="10" class='penpos' target="" alt="TG Lantai 1" title="TG Lantai 1"
                        href="" coords="624,226,9" shape="circle">
                    <area id="11" class='penpos' target="" alt="TF 2.1 A" title="TF 2.1 A"
                        href="" coords="441,460,9" shape="circle">
                    <area id="12" class='penpos' target="" alt="Depan Lab Desain Kerja dan Ergonomi"
                        title="Depan Lab Desain Kerja dan Ergonomi" href="" coords="811,496,9"
                        shape="circle">
                    <area id="13" class='penpos' target="" alt="Sebelah TF 2.3" title="Sebelah TF 2.3"
                        href="" coords="581,389,9" shape="circle">
                    <area id="14" class='penpos' target="" alt="Jembatan ke Farmasi"
                        title="Jembatan ke Farmasi" href="" coords="767,532,9" shape="circle">
                    <area id="15" class='penpos' target="" alt="Antara TE dan Keluwih"
                        title="Antara TE dan Keluwih" href="" coords="564,370,9" shape="circle">
                    <area id="16" class='penpos' target="" alt="Sebelah TG" title="Sebelah TG" 
                        href="" coords="809,286,9" shape="circle">
                    <area id="17" class='penpos' target="" alt="Jalan Antara TA dan TF"
                        title="Jalan Antara TA dan TF" href="" coords="458,521,9" shape="circle">
                    <area id="18" class='penpos' target="" alt="Depan Papan No Smoking"
                        title="Depan Papan No Smoking" href="" coords="510,553,9" shape="circle">
                    <area id="19" class='penpos' target="" alt="Depan BEM FT" title="Depan BEM FT"
                        href="" coords="328,532,9" shape="circle">
                    <area id="20" class='penpos' target="" alt="Depan TA" title="Depan TA"
                        href="" coords="536,600,9" shape="circle">
                </map>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card card-status" style="position: fixed; bottom:0;">
                    <div class="card-body">
                        <h3 class="text-center">Informasi Pos</h3>
                        <p class="text-dark" id="info-rally">
                        <div id='ket-0' class='info-penpos'>
                            <b>Nama:</b> <br>
                            <b>Tipe:</b> <br>
                            <b>Lokasi:</b> <br>
                            <b>Status:</b> <br>
                            <b>Kartu yang didapatkan:</b>
                        </div>
                        <?php $nomer = 1; ?>
                        @foreach ($statusPenpos as $sp)
                            <div id='ket-{{ $nomer }}' style='display:none' class='info-penpos'>
                                <b>Nama:</b> {{ $sp->name }}<br>
                                <b>Tipe:</b> {{ $sp->type }}<br>
                                <b>Lokasi:</b> {{ $sp->lokasi }}<br>
                                <b>Status:</b>
                                @if ($sp->status == 'KOSONG')
                                    <span class="fs-14 badge bg-pale-green text-green rounded-pill"
                                        id='status-{{ $nomer }}'>{{ $sp->status }}</span>
                                @elseif ($sp->status == 'PENUH')
                                    <span class="fs-14 badge bg-pale-red text-red rounded-pill"
                                        id='status-{{ $nomer }}'>{{ $sp->status }}</span>
                                @else
                                    <span class="fs-14 badge bg-pale-yellow text-yellow rounded-pill"
                                        id='status-{{ $nomer }}'>{{ $sp->status }}</span>
                                @endif
                                <br>
                                <b>Kartu yang didapatkan:</b>
                                @if ($sp->kartu == 'wajik')
                                    <span class="text-red fs-20">♦</span>
                                @elseif ($sp->kartu == 'keriting')
                                    <span class="text-dark fs-20">♣</span>
                                @elseif ($sp->kartu == 'love')
                                    <span class="text-red fs-20">♥</span>
                                @elseif ($sp->kartu == 'waru')
                                    <span class="text-dark fs-20">♠</span>
                                @else
                                    {{ $sp->kartu }}
                                @endif
                            </div>
                            <?php $nomer++; ?>
                        @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
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
                            {{-- kosong --}}
                        </div>
                        <hr class="my-8">
                        <h3>Kartu Pecahan</h3>
                        <div id="listPotongan" class="owl-carousel owl-theme mt-2">
                            {{-- kosong --}}
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
                <div class="modal-body">
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h3 class="text-center">Mekanisme Penukaran Kartu</h3>
                    <div style="color: #000">
                        <ol>
                            <li>
                                Potongan kartu dapat ditukarkan pada Menu 'Tukar Kartu'.
                            </li>
                            <li>
                                Potongan kartu yang diperoleh dapat ditukarkan dengan kartu acak apabila tim menukarkan
                                dengan 3 potongan kartu. Kartu yang ditukarkan juga dapat dipilih (angka dan simbol)
                                apabila
                                tim menukarkan dengan 5 potongan kartu.
                            </li>
                            <li>
                                Apabila ada kartu yang tidak diinginkan, kartu dapat ditukarkan menggunakan “penukaran
                                spesial”. Setiap tim hanya memiliki kesempatan “penukaran spesial” sebanyak 1 kali.
                                Tim dapat memilih salah satu dari angka maupun simbol yang diinginkan (contoh: ingin
                                menukarkan berdasarkan angka atau ingin menukarkan berdasarkan simbol) dengan menukarkan
                                1 kartu
                                utuh yang tidak diinginkan dan 1 potongan kartu. "Penukaran spesial" hanya akan dibuka
                                pada jam tertentu,
                                jadi pastikan para <i>Survivors</i> memperhatikan jam tersebut.
                            </li>
                            <li>
                                Penukaran kartu menjadi <i>Royale</i> dapat dilakukan di <i>Dealers Table</i> ketika
                                sesi <i>Rally Games</i> berlangsung
                                dan tutup setelah sesi <i>Rally Games</i> usai.
                                <br><br>Terdapat beberapa syarat yang harus dipenuhi oleh <i>Survivors</i> sebelum
                                menukarkan
                                kartu menjadi <i>Royale</i>, yaitu:<br>
                                • Kartu harus berjumlah lebih dari 6 kartu. <br>
                                • Kartu harus terdiri atas 4 simbol kartu <i>(clubs (♣), diamonds (♦), hearts (♥), and
                                    spades (♠))</i>.<br>
                                • Kartu harus terbentuk menjadi salah satu kombinasi kartu di bawah ini: <br>
                                - <i>Four of Kind</i>, yaitu rangkaian kartu yang terdiri atas 4 angka sama. <br>
                                - <i>Full House</i>, yaitu rangkaian kartu terdiri atas 3 kartu angka sama dan 2 kartu
                                angka sama. <br>
                                - <i>Straight (bukan straight flush)</i>, yaitu rangkaian 5 kartu dengan angka yang
                                berurutan.<br>
                                - <i>Two Pair</i>, yaitu rangkaian kartu yang terdiri atas 2 pasang kartu yang memiliki
                                angka yang sama.<br>
                            </li>
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
                    <button id="random" class="btn btn-primary mb-2" data-bs-dismiss="modal">Random</button>
                    <button id="pilih" class="btn btn-primary mb-2" data-bs-toggle="modal"
                        data-bs-target="#choose">Pilih</button>
                    <button id="spesial" class="btn btn-primary mb-2" data-bs-toggle="modal"
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
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h2 class="modal-title text-center mb-5" id="chooseLabel">Pilih</h2>
                    <select id="chooseCard" class="form-select">
                        @for ($y = 0; $y < count($kartu); $y++)
                            <option value="{{ $kartu[$y]->namaKartu }}">
                                {{ str_replace('_', ' ', $kartu[$y]->namaKartu) }}</option>
                        @endfor
                    </select>
                    <div class="mt-3 text-end">
                        <button id="konfirmasi_pilihan" type="button" class="btn btn-success"
                            data-bs-dismiss="modal">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Spesial --}}
    <div class="modal fade" id="special" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="specialLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body flex">
                    <h2 class="modal-title text-center mb-5" id="specialLabel">Pilih</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <h5>Pilih Kartu Utuh:</h5>
                    <select id="selectKartu" class="form-select">
                        <!-- kosong -->
                    </select><br><br>
                    <h5>Pilih Jenis:</h5>
                    <div class="col-auto">
                        <select id="jenis" class="form-select mb-3">
                            <option value="angka">Angka</option>
                            <option value="simbol">Simbol</option>
                        </select>
                        <select id="specialCard" class="form-select">
                            @for ($z = 6; $z <= 10; $z++)
                                <option value="{{ $z }}">{{ $z }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="text-end">
                        <button id="konfirmasi_spesial" type="button" class="btn btn-success mt-3"
                            data-bs-dismiss="modal">Konfirmasi</button>
                    </div>
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
                        <a id="modal_02" href="#" class="" style="color: white" data-bs-toggle="modal"
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
            // localStorage.removeItem('special');

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
        window.Echo.channel('penposChannel').listen('.penposStatus', (e) => {
            // alert(e.id)
            if (e.penposStatus.status == 'KOSONG') {
                $('#status-' + e.penposStatus.penpos.id).html(e.penposStatus.status).removeClass(
                    'fs-14 badge bg-pale-red text-red rounded-pill').removeClass(
                    'fs-14 badge bg-pale-yellow text-yellow rounded-pill').addClass(
                    'fs-14 badge bg-pale-green text-green rounded-pill');
            } else if (e.penposStatus.status == 'PENUH') {
                $('#status-' + e.penposStatus.penpos.id).html(e.penposStatus.status).removeClass(
                    'fs-14 badge bg-pale-green text-green rounded-pill').removeClass(
                    'fs-14 badge bg-pale-yellow text-yellow rounded-pill').addClass(
                    'fs-14 badge bg-pale-red text-red rounded-pill');
            } else {
                $('#status-' + e.penposStatus.penpos.id).html(e.penposStatus.status).removeClass(
                    'fs-14 badge bg-pale-red text-red rounded-pill').addClass(
                    'fs-14 badge bg-pale-yellow text-yellow rounded-pill');
            }
        });

        $('#modal_02').click(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.kartu') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>'
                },
                success: function(data) {
                    // alert('success');

                    var i = 1
                    $.each(data.utuh, function(key, value) {
                        $("#listUtuh").trigger('remove.owl.carousel', [key]).trigger(
                            'refresh.owl.carousel');
                    })

                    $.each(data.utuh, function(key, value) {
                        $('#listUtuh')
                            .trigger('add.owl.carousel', [
                                `<div class="item">
                                    <div class="card border-0 shadow ">
                                        <img src="{{ asset('/asset/img/${data.utuh[key].gambar}.png') }}" class="card-img-top">
                                    </div>
                                    <h6>${data.utuh[key].namaKartu.replace('_', ' ')}</h6>
                                </div>`
                            ]).trigger('refresh.owl.carousel');
                    })

                    $.each(data.potongan, function(key, value) {
                        $("#listPotongan").trigger('remove.owl.carousel', [key]).trigger(
                            'refresh.owl.carousel');
                    })

                    $.each(data.potongan, function(key, value) {
                        $('#listPotongan')
                            .trigger('add.owl.carousel', [
                                `<div class="item">
                                    <div class="card border-0 shadow">
                                        <img src="{{ asset('/asset/img/${data.potongan[key].gambar}.png') }}" class="card-img-top kartu-potongan">
                                    </div>
                                    <h6>${data.potongan[key].namaKartu.replace('_', ' ')}-${i}</h6>
                                </div>`
                            ]).trigger('refresh.owl.carousel');
                        i++;
                    })

                },
                error: function() {
                    // alert('error');
                }
            })
        })

        let special = localStorage.getItem('special');
        $('#tukarKartu').click(function() {
            console.log(localStorage.getItem('special'));
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
                    // console.log(jumlahPotongan);
                    // console.log(jumlahKartu);
                    console.log('special ' + data.special);
                    $('#spesial').prop('disabled', false);


                    $('#selectKartu').html(data.selectKartu);

                    if (data.special == 'tutup') {
                        console.log('masuk special');
                        $('#spesial').prop('disabled', true);
                    }

                    if (jumlahPotongan < 1) {
                        $('#spesial').prop('disabled', true);
                        $('#random').prop('disabled', true);
                        $('#pilih').prop('disabled', true);
                        console.log('masuk 1');

                    } else if (jumlahPotongan < 3) {
                        if ((jumlahKartu < 1 || special == 'true') && data.special == 'tutup') {

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

                    if ((jumlahKartu < 1 || special == 'true') && data.special == 'tutup') {
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
                    console.log(data.utuh);
                    let cardName = data.card[0].name.replace('_', ' ');
                    console.log(cardName);

                    $('#listUtuh')
                        .trigger('add.owl.carousel', [
                            `<div class="item">
                            <div class="card border-0 shadow ">
                                <img src="{{ asset('/asset/img/${data.utuh.gambar}.png') }}" class="card-img-top">
                            </div>
                            <h6>${cardName}</h6>
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
                    console.log(data.utuh);
                    let cardName = data.utuh.namaKartu.replace('_', ' ');
                    console.log(cardName);

                    $('#listUtuh')
                        .trigger('add.owl.carousel', [
                            `<div class="item">
                            <div class="card border-0 shadow ">
                                <img src="{{ asset('/asset/img/${data.utuh.gambar}.png') }}" class="card-img-top">
                            </div>
                            <h6>${cardName}</h6>
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
            localStorage.setItem('special', 'true');
            console.log(localStorage.getItem('special'));
            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.tukar') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'tipe': 'spesial',
                    'kartukey': $('#selectKartu').val(),
                    'specialCard': $('#specialCard').val()
                },
                success: function(data) {
                    // alert('success');
                    console.log(data.utuh);
                    let cardName = data.utuh.namaKartu.replace('_', ' ');
                    console.log(cardName);

                    $('#listUtuh')
                        .trigger('add.owl.carousel', [
                            `<div class="item">
                            <div class="card border-0 shadow ">
                                <img src="{{ asset('/asset/img/${data.utuh.gambar}.png') }}" class="card-img-top">
                            </div>
                            <h6>${cardName}</h6>
                        </div>`
                        ]).trigger('refresh.owl.carousel');

                    $("#listUtuh").trigger('remove.owl.carousel', [data.key]).trigger(
                        'refresh.owl.carousel');

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

        $(".penpos").on("click", function(e) {
            e.preventDefault();
            let id = $(this).attr('id')
            $('.info-penpos').hide();
            $('#ket-' + id).css("display", "block");

        });
    </script>
</body>

</html>
