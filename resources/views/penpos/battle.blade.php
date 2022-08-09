@extends('layouts.penpos')

@section('style')
    <style>
        #halHistory{
            color: #343F52;
        }

        #halUtama, #halHistory:hover{
            color: #5179DF;
        }
    </style>
@endsection

@section('penpos_content')
    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pt-md-14 text-center">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $penpos->name }}</h1>
                </div>
                <div class="card-body">
                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="col-auto">
                            <h3>Nama Tim 1: </h3>
                        </div>
                        <div class="col-auto mx-3">
                            <select name="namaTim" id="pemain1_id" class="form-select" required>
                                @if (count($all_pemain_playing) != 0)
                                    <option value="">-- Pilih Pemain yang Bermain --</option>
                                    @foreach ($all_pemain_playing as $pemainPlaying)
                                        <option value="{{ $pemainPlaying->id }}">
                                            {{ $pemainPlaying->name }}
                                        </option>
                                    @endforeach
                                @endif
                                <option value="">-- Pilih Pemain 1 --</option>
                                @foreach ($all_pemain as $pemain)
                                    <option value="{{ $pemain->id }}">
                                        {{ $pemain->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <form action="">
                                <button type="button" class="btn btn-primary" id='cekPemain1' validasi="0"
                                    name="btnSubmit" onclick='cekPosBattle(1)'>Cek</button>
                                <button type="button" class="btn btn-primary" id='resetPos1'
                                    onclick='resetPlaying(1)'>Reset</button>
                            </form>
                        </div>
                    </div>
                    <div class="row g-3 mt-3 align-items-center justify-content-center">
                        <div class="col-auto">
                            <h3>Nama Tim 2: </h3>
                        </div>
                        <div class="col-auto mx-3">
                            <select name="namaTim" id="pemain2_id" class="form-select" required>
                                @if (count($all_pemain_playing) != 0)
                                    <option value="">-- Pilih Pemain yang Bermain--</option>
                                    @foreach ($all_pemain_playing as $pemainPlaying)
                                        <option value="{{ $pemainPlaying->id }}">
                                            {{ $pemainPlaying->name }}
                                        </option>
                                    @endforeach
                                @endif
                                <option value="">-- Pilih Pemain 2 --</option>
                                @foreach ($all_pemain as $pemain)
                                    <option value="{{ $pemain->id }}">
                                        {{ $pemain->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <form action="">
                                <button type="button" class="btn btn-primary" id='cekPemain2' validasi="0"
                                    name="btnSubmit" onclick='cekPosBattle(2)'>Cek</button>
                                <button type="button" class="btn btn-primary" id='resetPos2'
                                    onclick='resetPlaying(2)'>Reset</button>
                            </form>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-outline-primary mb-2" onclick='updateStatus()'
                            id="btnSubmit">Submit</button>
                    </div>
                    <hr class="my-8">

                    <div>
                        <form action="" method="GET">
                            <button type="button" class="btn btn-success mb-2" id="btnMenang" disabled
                                onclick="showModal('Menang')">Menang</button>
                            <button type="button" class="btn btn-yellow mb-2" id="btnSeri" disabled
                                onclick="showModal('Seri')">Seri</button>
                            <button type="button" class="btn btn-danger mb-2" id="btnKalah" disabled
                                onclick="showModal('Kalah')">Kalah</button>
                        </form>
                    </div>
                </div>
                <br>
                @if ($penpos->status == 'KOSONG')
                    @php
                        $warna = 'card-footer text-muted bg-red';
                    @endphp
                @elseif ($penpos->status == 'PENUH')
                    @php
                        $warna = 'card-footer text-muted bg-green';
                    @endphp
                @else
                    @php
                        $warna = 'card-footer text-muted bg-yellow';
                    @endphp
                @endif
                <div class="{{ $warna }}" id='alertPos'>
                    <span class="font-color" id="status_pos">Status Pos: {{ $penpos->status }}</span>
                </div>
                {{-- @if ($penpos->status == 'KOSONG')
        <div class="card-footer text-muted bg-red">
            <span class="font-color" id="status_pos">Status Pos: Open</span>
        </div>
        @elseif ($penpos->status == "PENUH")
        <div class="card-footer text-muted bg-green">
          <span class="font-color" id="status_pos">Status Pos: Penuh</span>
        </div>
        @else 
        <div class="card-footer text-muted bg-yellow">
          <span class="font-color" id="status_pos">Status Pos: Menunggu Lawan</span>
        </div>
        @endif --}}
            </div>
        </div>
    </section>

    {{-- Modal Konfirmasi Menang/Seri/Kalah --}}
    <div class="modal fade" id="modal_confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="notifLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                  <h5 id="modal_message"></h5>
                    {{-- Contoh Menang: Apakah anda yakin Tim 1 Menang dari Tim 2 --}}
                    {{-- Contoh Seri: Apakah anda yakin Tim 1 Seri dengan Tim 2 --}}
                    {{-- Contoh Kalah: Apakah anda yakin Tim 1 Kalah dari Tim 2 --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button id="konfirmasi" type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="">Ya</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('penpos_script')
    <script>
        function updateStatus() {
            let validasi1 = $('#cekPemain1').attr('validasi');
            let validasi2 = $('#cekPemain2').attr('validasi');
            let totalValidasi = validasi1 + validasi2;

            $.ajax({
                type: 'POST',
                url: "{{ route('penpos.ubahStatusPosBattle') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'totalValidasi': totalValidasi,
                    'pemain1_id': $('#pemain1_id').val(),
                    'pemain2_id': $('#pemain2_id').val(),
                },
                success: function(data) {
                    if (data.status != "error") {
                        //Update status pos di dashboard
                        if (data.penpos.status == "KOSONG") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-red');
                        } else if (data.penpos.status == "PENUH") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-green');
                        } else {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-yellow');
                        }
                        $('#status_pos').html("Status Pos: " + data.penpos.status);

                        // Disabled di button menang,kalah,seri dimatikan
                        $('#btnMenang').attr('disabled', false);
                        $('#btnKalah').attr('disabled', false);
                        $('#btnSeri').attr('disabled', false);
                        // Disabled di button check diaktifkan
                        $('#cekPemain1').attr('disabled', true);
                        $('#cekPemain2').attr('disabled', true);

                        // Button Submit dimatikan
                        $('#btnSubmit').attr('disabled', true);
                    } else {
                        alert(data.msg);
                        // Disabled di button check dimatikan
                        $('#cekPemain1').attr('disabled', false);
                        $('#cekPemain2').attr('disabled', false);
                        // Buka kunci drop downnya
                        $('#pemain1_id').attr('disabled', false);
                        $('#pemain2_id').attr('disabled', false);
                        // Set validation jadi 0 smua
                        $('#cekPemain1').attr('validasi', 0);
                        $('#cekPemain2').attr('validasi', 0);

                        //Penpos harus cek validasi lagi
                    }
                }
            });
        }

        function cekPosBattle($pemain) {
            let pemain_click = '';

            $('#cekPemain' + $pemain).attr('disabled', true);
            pemain_click = $('#pemain' + $pemain + '_id').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('penpos.cekPemainBattle') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'pemain_id': pemain_click,
                },
                success: function(data) {
                    if (data.status != "error") {
                        //Update status pos di dashboard
                        if (data.penpos.status == "KOSONG") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-red');
                        } else if (data.penpos.status == "PENUH") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-green');
                        } else {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-yellow');
                        }
                        $('#status_pos').html("Status Pos: " + data.penpos.status);

                        // Kunci dropdown listnya 
                        $('#pemain' + $pemain + '_id').attr('disabled', true);

                        // Set validasi
                        $('#cekPemain' + $pemain).attr('validasi', 1);

                        // Cek dropdownnya sudah ke lock atau blm
                        // Ambil 
                        var validasipemain1 = $('#cekPemain1').attr('validasi');
                        var validasipemain2 = $('#cekPemain2').attr('validasi');
                        var option_pemain = "";
                        // CEK apakah masih ada yang playing?
                        if (data.total != 0) {
                            option_pemain +=
                                `<option value="" selected>-- Pilih Nama Pemain Playing --</option>`;
                            $.each(data.all_pemain_playing, (key, pemain_playing) => {
                                option_pemain +=
                                    `<option value=${pemain_playing.id}>${pemain_playing.name}</option>`;
                            });
                        }
                        option_pemain += `<option value="" selected>-- Pilih Nama Pemain --</option>`;
                        $.each(data.pemainNonPlaying, (key, pemain_nonplaying) => {
                            option_pemain +=
                                `<option value=${pemain_nonplaying.id}>${pemain_nonplaying.name}</option>`;
                        });
                        if (validasipemain1 != '1') {
                            $('#pemain1_id').html(option_pemain);
                        } else if (validasipemain2 != '1') {
                            $('#pemain2_id').html(option_pemain);
                        }
                    } else {
                        alert(data.msg);
                        $('#cekPemain' + $pemain).attr('disabled', false);
                    }
                }
            });

        }

        function resetPlaying($pemain) {
            let pemain_click = '';

            let validasi1 = $('#cekPemain1').attr('validasi');
            let validasi2 = $('#cekPemain2').attr('validasi');
            let totalValidasi = validasi1 + validasi2;

            // Set validasi jadi 0
            $('#cekPemain' + $pemain).attr('validasi', 0);

            //Disable button yang trigger resetPlaying
            $('#resetPos' + $pemain).attr('disabled', true);

            //Ambil value pemain_id yang click ini
            pemain_click = $('#pemain' + $pemain + '_id').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('penpos.resetPlaying') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'pemain_id': pemain_click,
                    'totalValidasi': totalValidasi,
                },
                success: function(data) {
                    // JANGAN LUPA TAMBAHIN IF DATA.STATUS != ERROR
                    if (data.status != "error") {
                        // Deklarasi variabel option_pemain
                        var option_pemain = '';

                        // Kunci button menang kalah
                        $('#btnMenang').attr('disabled', true);
                        $('#btnSeri').attr('disabled', true);
                        $('#btnKalah').attr('disabled', true);

                        //Update status pos di dashboard
                        if (data.penpos.status == "KOSONG") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-red');
                        } else if (data.penpos.status == "PENUH") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-green');
                        } else {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-yellow');
                        }
                        $('#status_pos').html("Status Pos: " + data.penpos.status);

                        // Buka kunci button Cek
                        $('#cekPemain' + $pemain).attr('disabled', false);

                        // Buka kunci button submit
                        $('#btnSubmit').attr('disabled', false);

                        // Update drop down
                        // CEK apakah masih ada yang playing?
                        if (data.total != 0) {
                            option_pemain +=
                                `<option value="" selected>-- Pilih Nama Pemain Playing --</option>`;
                            $.each(data.all_pemain_playing, (key, pemain_playing) => {
                                option_pemain +=
                                    `<option value=${pemain_playing.id}>${pemain_playing.name}</option>`;
                            });
                        }
                        option_pemain += `<option value="" selected>-- Pilih Nama Pemain --</option>`;
                        $.each(data.all_pemain, (key, pemain) => {
                            option_pemain += `<option value=${pemain.id}>${pemain.name}</option>`;
                        });

                        if (data.total == 0) {
                            // Isikan dropdown box nya
                            $('#pemain1_id').html(option_pemain);
                            $('#pemain2_id').html(option_pemain);
                            // Buka kunci dropdown
                            $('#pemain1_id').attr('disabled', false);
                            $('#pemain2_id').attr('disabled', false);
                        } else {
                            // Isikan dropdown box nya
                            $('#pemain' + $pemain + '_id').html(option_pemain);
                            // Buka kunci dropdown
                            $('#pemain' + $pemain + '_id').attr('disabled', false);
                        }

                    } else {
                        alert(data.msg);
                    }

                    // Buka kunci button resetnya
                    $('#resetPos' + $pemain).attr('disabled', false);
                }
            });
        }

        function resultGame($hasil) {
            let pemain_click = $('#pemain1_id').val();
            let pemain_lawan = $('#pemain2_id').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('penpos.resultGame') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'pemain1_id': pemain_click,
                    'pemain2_id': pemain_lawan,
                    'status_game': $hasil,
                },
                success: function(data) {
                    if (data.status != "error") {
                        //Update dropdown box nya
                        var option_pemain = `<option value="" hidden selected>-- Pilih Nama Pemain --</option>`;
                        $.each(data.all_pemain, (key, pemain) => {
                            option_pemain += `<option value=${pemain.id}>${pemain.name}</option>`;
                        });
                        $('#pemain1_id').html(option_pemain);
                        $('#pemain2_id').html(option_pemain);

                        // Disabled di button check dibuka
                        $('#cekPemain1').attr('disabled', false);
                        $('#cekPemain2').attr('disabled', false);
                        // Buka kunci drop downnya
                        $('#pemain1_id').attr('disabled', false);
                        $('#pemain2_id').attr('disabled', false);

                        // Button Submit dibuka
                        $('#btnSubmit').attr('disabled', false);

                        //Kunci button menang kalah seri
                        $('#btnMenang').attr('disabled', true);
                        $('#btnKalah').attr('disabled', true);
                        $('#btnSeri').attr('disabled', true);

                        //Update status pos di dashboard
                        if (data.penpos.status == "KOSONG") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-red');
                        } else if (data.penpos.status == "PENUH") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-green');
                        } else {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-yellow');
                        }
                        $('#status_pos').html("Status Pos: " + data.penpos.status);
                    } else {
                        alert(data.msg);
                    }
                }
            });

        }

        function showModal(result){
          var msg_modal = "";
          
          if(result == "Menang"){
            msg_modal = "Apakah anda yakin Tim 1 Menang dari Tim 2?";
            $('#konfirmasi').attr("onclick","resultGame('Menang')");
          }
          else if(result == "Seri"){
            msg_modal = "Apakah anda yakin Tim 1 Seri dengan Tim 2?";
            $('#konfirmasi').attr("onclick","resultGame('Seri')");
          }
          else if (result == "Kalah"){
            msg_modal = "Apakah anda yakin Tim 1 Kalah dari Tim 2?";
            $('#konfirmasi').attr("onclick","resultGame('Kalah')");
          }
          $('#modal_message').html(msg_modal);
          $('#modal_confirm').modal('show');
        }
    </script>
@endsection
