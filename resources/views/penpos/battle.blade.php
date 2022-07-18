@extends('layouts.penpos')
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
                <option value="" hidden>-- Pilih Nama Pemain --</option>
                @foreach ($all_pemain as $pemain)
                    <option value="{{ $pemain->id }}">
                        {{ $pemain->name }}
                    </option>
                @endforeach
              </select>
            </div>
            <div class="col-auto">
              <form action="">
                <button type="button" class="btn btn-primary" id='cekPemain1' name="btnSubmit" onclick='cekPosBattle(1)'>Cek</button>
              </form>
            </div>
          </div>
          <div class="row g-3 mt-3 align-items-center justify-content-center">
            <div class="col-auto">
              <h3>Nama Tim 2: </h3>
            </div>
            <div class="col-auto mx-3">
              <select name="namaTim" id="pemain2_id" class="form-select" required>
                <option value="" hidden>-- Pilih Nama Pemain --</option>
                @foreach ($all_pemain as $pemain)
                    <option value="{{ $pemain->id }}">
                        {{ $pemain->name }}
                    </option>
                @endforeach
              </select>
            </div>
            <div class="col-auto">
              <form action="">
                <button type="button" class="btn btn-primary" id='cekPemain2' name="btnSubmit" onclick='cekPosBattle(2)'>Cek</button>
              </form>
            </div>
          </div>
          <div class="mt-3">
            <button type="button" class="btn btn-outline-primary mb-2" onclick='updateStatus()' id="btnSubmit">Submit</button>
          </div>
          <hr class="my-8">
            {{-- <div class="row">
                <div class="col-md-4 text-end pt-2">
                    <label> <h3>Nama Tim 1 :</h3></label>
                </div>
                <div class="col-md-5">
                  <select name="namaTim" id="pemain1_id" class="form-select" required>
                    <option value="" hidden>-- Pilih Nama Pemain --</option>
                    @foreach ($all_pemain as $pemain)
                        <option value="{{ $pemain->id }}">
                            {{ $pemain->name }}
                        </option>
                    @endforeach
                </select>
                </div>
                <div class="col-md-3 text-start">
                    <form action="">
                        <button type="button" class="btn btn-success" id='cekPemain1' validasi="0" onclick='cekPosBattle(1)'>Check</button>
                    </form>
                </div>
            </div> --}}

            {{-- <div class="col-md-6">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-end pt-2">
                            <label> <h3>Nama Tim 2 :</h3></label>
                        </div>
                        <div class="col-md-5">
                          <select name="namaTim" id="pemain2_id" class="form-select" required>
                            <option value="" hidden>-- Pilih Nama Pemain --</option>
                            @foreach ($all_pemain as $pemain)
                                <option value="{{ $pemain->id }}">
                                    {{ $pemain->name }}
                                </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-3 text-start">
                            <form action="">
                                <button type="button" class="btn btn-success" validasi="0" id='cekPemain2' onclick='cekPosBattle(2)'>Check</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div>
                <form action="" method="GET">
                    <button type="button" class="btn btn-success mb-2" id="btnMenang" disabled onclick="resultGame('Menang')">Menang</button>
                    <button type="button" class="btn btn-yellow mb-2" id="btnSeri" disabled onclick="resultGame('Seri')">Seri</button>
                    <button type="button" class="btn btn-danger mb-2" id="btnKalah" disabled onclick="resultGame('Kalah')">Kalah</button>
                </form>
            </div>
        </div>
        <br>
        @if ($penpos->status == "OPEN")
        <div class="card-footer text-muted bg-red">
            <span class="font-color" id="status_pos">Status Pos: Kosong</span>
        </div>
        @elseif ($penpos->status == "CLOSE")
        <div class="card-footer text-muted bg-green">
          <span class="font-color" id="status_pos">Status Pos: Penuh</span>
        </div>
        @else 
        <div class="card-footer text-muted bg-yellow">
          <span class="font-color" id="status_pos">Status Pos: Menunggu Lawan</span>
        </div>
        @endif
    </div>
</div>
</section>
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
        data:{
            '_token': '<?php echo csrf_token(); ?>',
            'totalValidasi': totalValidasi,
            'pemain1_id': $('#pemain1_id').val(),
            'pemain2_id': $('#pemain2_id').val(),
        },
        success: function (data) {
          if (data.status != "error"){
            //Kalau tidak error brarti status penpos full
            $('#status_pos').html(data.penpos.status);
            // Disabled di button menang,kalah,seri dimatikan
            $('#btnMenang').attr('disabled',false);
            $('#btnKalah').attr('disabled',false);
            $('#btnSeri').attr('disabled',false);
            // Disabled di button check diaktifkan
            $('#cekPemain1').attr('disabled', true);
            $('#cekPemain2').attr('disabled', true);

            // Button Submit dimatikan
            $('#btnSubmit').attr('disabled', true);
          }
          else{
            alert(data.msg);
            // Disabled di button check dimatikan
            $('#cekPemain1').attr('disabled', false);
            $('#cekPemain2').attr('disabled', false);
            // Buka kunci drop downnya
            $('#pemain1_id').attr('disabled', false);
            $('#pemain2_id').attr('disabled', false);
          }
        }
    });
  }

  function cekPosBattle($pemain) {
    let pemain_click = '';

    $('#cekPemain'+ $pemain).attr('disabled', true);
    pemain_click = $('#pemain'+$pemain+'_id').val();

    $.ajax({
        type: 'POST',
        url: "{{ route('penpos.cekPemainBattle') }}",
        data:{
            '_token': '<?php echo csrf_token(); ?>',
            'pemain_id': pemain_click,
        },
        success: function (data) {
          if (data.status != "error"){
            // Kalau tidak error brarti status penpos menunggu lawan
            $('#status_pos').html(data.penpos.status);
            
            // Kunci dropdown listnya 
            $('#pemain'+$pemain+'_id').attr('disabled', true);
            
            // Set validasi
            $('#cekPemain'+ $pemain).attr('validasi', 1);
          }
          else{
            alert(data.msg);
            $('#cekPemain'+ $pemain).attr('disabled', false);
          }
        }
    });

  }

  function resultGame($hasil) {
    let pemain_click = $('#pemain1_id').val();
    let pemain_lawan = $('#pemain2_id').val();

    $.ajax({
        type: 'POST',
        url: "{{ route('penpos.resultGame') }}",
        data:{
            '_token': '<?php echo csrf_token(); ?>',
            'pemain1_id': pemain_click,
            'pemain2_id': pemain_lawan,
            'status_game': $hasil,
        },
        success: function (data) {
          if (data.status != "error"){
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

            //Perbaruhi status penposnya
            $('#status_pos').html(data.penpos.status);
          }
          else{
            alert(data.msg);
          }
        }
    });

  }
</script>
@endsection