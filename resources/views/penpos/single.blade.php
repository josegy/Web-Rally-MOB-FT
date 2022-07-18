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
                  <h3>Nama Tim: </h3>
                </div>
                <div class="col-auto mx-3">
                  <select name="namaTim" id="pemain_id" class="form-select" required>
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
                    <button type="button" class="btn btn-primary" id='cekPos' name="btnSubmit" onclick='cekPosSingle()'>Cek</button>
                  </form>
                </div>
              </div>
              <hr class="my-8">
              <div>
                  <form action="" method="GET">
                      <button type="button" class="btn btn-green" id="btn_menang" disabled onclick="resultGame('Menang')">Menang</button>
                      <button type="button" class="btn btn-danger" id="btn_kalah" disabled onclick="resultGame('Kalah')">Kalah</button>
                  </form>
              </div>
          </div>
          @if ($penpos->status == "OPEN")
          <div class="card-footer text-muted bg-red">
              <span class="font-color" id="status_pos">Status Pos: Kosong</span>
          </div>
          @elseif ($penpos->status == "CLOSE")
          <div class="card-footer text-muted bg-green">
            <span class="font-color" id="status_pos">Status Pos: Penuh</span>
          </div>
          @endif
      </div>
  </div>
</section>
@endsection
@section('penpos_script')
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
            
            // Kunci button menang kalah
            $('#btn_menang').attr('disabled',true);
            $('#btn_kalah').attr('disabled',true);

            // Perbaruhi status penposnya
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
@endsection