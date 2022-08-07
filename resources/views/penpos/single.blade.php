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
                            <h3>Nama Tim: </h3>
                        </div>
                        <div class="col-auto mx-3">
                            <select name="namaTim" id="pemain_id" class="form-select" required>
                                @if (count($all_pemain_playing) != 0)
                                    <option value="" hidden>-- Pilih Nama Pemain Playing--</option>
                                    @foreach ($all_pemain_playing as $pemainPlaying)
                                        <option value="{{ $pemainPlaying->id }}">
                                            {{ $pemainPlaying->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" hidden>-- Pilih Nama Pemain --</option>
                                    @foreach ($all_pemain as $pemain)
                                        <option value="{{ $pemain->id }}">
                                            {{ $pemain->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-auto">
                            <form action="">
                                <button type="button" class="btn btn-primary" id='cekPos' name="btnSubmit"
                                    onclick='cekPosSingle()'>Cek</button>
                                <button type="button" class="btn btn-primary" id='resetPos'
                                    onclick='resetPlaying()'>Reset</button>
                            </form>
                        </div>
                    </div>
                    <hr class="my-8">
                    <div>
                        <form action="" method="GET">
                            <button type="button" class="btn btn-green" id="btn_menang" disabled
                                onclick="resultGame('Menang')">Menang</button>
                            <button type="button" class="btn btn-danger" id="btn_kalah" disabled
                                onclick="resultGame('Kalah')">Kalah</button>
                        </form>
                    </div>
                </div>
                @if ($penpos->status == 'KOSONG')
                    @php
                        $warna = 'card-footer text-muted bg-red';
                    @endphp
                @else
                    @php
                        $warna = 'card-footer text-muted bg-green';
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
          </div> --}}
            </div>
        </div>
    </section>

    {{-- Modal Konfirmasi Menang/Seri/Kalah --}}
    <div class="modal fade" id="confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="notifLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                    {{-- Contoh Menang: Apakah anda yakin Tim 1 Menang dari Tim 2? --}}
                    {{-- Contoh Kalah: Apakah anda yakin Tim 1 Kalah dari Tim 2? --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button id="konfirmasi" type="button" class="btn btn-primary" data-bs-dismiss="modal">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('penpos_script')
    <script>
        function cekPosSingle() {
            $('#cekPos').attr('disabled', true);
            $.ajax({
                type: 'POST',
                url: "{{ route('penpos.cekPosSingle') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'pemain1_id': $('#pemain_id').val(),
                },
                success: function(data) {
                    if (data.status != "error") {
                        //Update status pos di dashboard
                        if (data.penpos.status == "KOSONG") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-red');
                        } else if (data.penpos.status == "PENUH") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-green');
                        }
                        $('#status_pos').html("Status Pos: " + data.penpos.status);

                        //Hapus disabled pada button menang/kalah
                        $('#btn_menang').attr('disabled', false);
                        $('#btn_kalah').attr('disabled', false);
                        // Kunci dropdown listnya 
                        $('#pemain_id').attr('disabled', true);
                    } else {
                        alert(data.msg);
                        $('#cekPos').attr('disabled', false);
                    }
                }
            });
        }

        function resetPlaying() {
            //Disable button yang trigger resetPlaying
            $('resetPos').attr('disabled', true);

            $.ajax({
                type: 'POST',
                url: "{{ route('penpos.resetPlaying') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'pemain_id': $('#pemain_id').val(),
                },
                success: function(data) {
                    // JANGAN LUPA TAMBAHIN IF DATA.STATUS != ERROR
                    if (data.status != "error") {
                        // Deklarasi variabel option_pemain
                        var option_pemain = '';

                        // Buka kunci drop downnya
                        $('#pemain_id').attr('disabled', false);

                        // Buka kunci button cek
                        $('#cekPos').attr('disabled', false);

                        // Kunci button menang kalah
                        $('#btn_menang').attr('disabled', true);
                        $('#btn_kalah').attr('disabled', true);

                        //Update status pos di dashboard
                        if (data.penpos.status == "KOSONG") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-red');
                        } else if (data.penpos.status == "PENUH") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-green');
                        }
                        $('#status_pos').html("Status Pos: " + data.penpos.status);

                        // Update drop down
                        // CEK apakah masih ada yang playing?
                        if (data.total != 0) {
                            option_pemain +=
                                `<option value="" hidden selected>-- Pilih Nama Pemain Playing --</option>`;
                            $.each(data.all_pemain_playing, (key, pemain_playing) => {
                                option_pemain +=
                                    `<option value=${pemain_playing.id}>${pemain_playing.name}</option>`;
                            });
                        } else {
                            option_pemain +=
                            `<option value="" hidden selected>-- Pilih Nama Pemain --</option>`;
                            $.each(data.all_pemain, (key, pemain) => {
                                option_pemain += `<option value=${pemain.id}>${pemain.name}</option>`;
                            });
                        }

                        $('#pemain_id').html(option_pemain);
                    } else {
                        alert(data.msg);
                    }
                    //Buka kunci pada button reset
                    $('resetPos').attr('disabled', false);
                }

            });
        }

        function resultGame($hasil) {
            let pemain_click = $('#pemain_id').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('penpos.resultGame') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'pemain1_id': pemain_click,
                    'status_game': $hasil,
                },
                success: function(data) {
                    if (data.status != "error") {
                        //Update dropdown box nya
                        var option_pemain = `<option value="" hidden selected>-- Pilih Nama Pemain --</option>`;
                        $.each(data.all_pemain, (key, pemain) => {
                            option_pemain += `<option value=${pemain.id}>${pemain.name}</option>`;
                        });
                        $('#pemain_id').html(option_pemain);

                        // Buka kunci drop downnya
                        $('#pemain_id').attr('disabled', false);

                        // Kunci button menang kalah
                        $('#btn_menang').attr('disabled', true);
                        $('#btn_kalah').attr('disabled', true);

                        //Update status pos di dashboard
                        if (data.penpos.status == "KOSONG") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-red');
                        } else if (data.penpos.status == "PENUH") {
                            $('#alertPos').attr('class', 'card-footer text-muted bg-green');
                        }
                        $('#status_pos').html("Status Pos: " + data.penpos.status);
                    } else {
                        alert(data.msg);
                    }
                    // Buka kunci pada button cek
                    $('#cekPos').attr('disabled', false);
                }
            });

        }
    </script>
@endsection
