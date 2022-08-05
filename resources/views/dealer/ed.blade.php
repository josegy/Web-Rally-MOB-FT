@extends('layouts.penpos')
@section('penpos_content')
@if (session('status'))
            <div class="alert alert-custom alert-light-success fade show mb-5" role="alert" style="width:100%; Max-height:5em;">
                <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                <div class="alert-text" style="font-size:125%;">{{session('status')}}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
            @endif
    <div class="container pt-10 pt-md-14">
        <div class='card'>
            <div class="card-header">
                <h1>ATUR WAKTU</h1>
            </div>
            <div class='card-body'>
                <form action="{{route('ed-edit')}}" method='post'>
                    @csrf
                    <div>
                        <label for=""><h3>Waktu Mulai</h3></label>
                        <input type="time" class='form-control' id='start' name='start' value='{{$data[0]->start}}'>
                        <br>
                        <label for=""><h3>Waktu Selesai</h3></label>
                        <input type="time" class='form-control' id='end' name='end' value='{{$data[0]->end}}'>
                    </div>
                    <br>
                    <div class="text-end">
                        <button class="btn btn-primary" type='submit'>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus --}}
    <div class="modal fade" id="confirmSimpan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="notifLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                    Apakah Anda Yakin Ingin Membuka Sesi Pada Jam Tersebut?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
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
                    Selamat, Sesi Berhasil Dibuka!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK!</button>
                </div>
            </div>
        </div>
    </div>

@endsection
