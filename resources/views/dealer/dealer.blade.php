@extends('layouts.penpos')
@section('cdn')
    {{-- CDN Owl Carousel --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CDN Owl Carousel --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('penpos_content')
    <div class="container pt-10 pt-md-14">
        <div class="card">
            <div class="card-header">
                <h1 style="text-align: center">TUKAR ROYALE CARD</h1>
            </div>
            <div class="card-body">
                <div class="row align-items-center justify-content-center">
                    <div class="col-auto">
                        <h3>Nama Tim:</h3>
                    </div>
                    {{-- Select Nama Tim --}}
                    <div class="col-auto">
                        <select class="form-select" name="teamName" id="teamName">
                            <option value="pilih" hidden>-- Pilih Pemain --</option>
                            @for ($x = 0; $x < count($pemain); $x++)
                                <option value="{{ $pemain[$x]->id }}">{{ str_replace('_', ' ', $pemain[$x]->name) }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>  
                <hr class="my-2">
                <div class="row align-items-center justify-content-center">
                    <div class="col-auto mb-4">
                        <h2>KARTU DIMILIKI</h2>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div id="listUtuh" class="owl-carousel owl-theme">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer mt-3">
                <div class="row align-items-center">
                    <button id="btnHapus" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmHapus">HAPUS</button>
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
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button id="konfirmasiHapus" type="button" class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>
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
@endsection
