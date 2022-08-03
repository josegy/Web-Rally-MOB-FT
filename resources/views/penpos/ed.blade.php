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
    <div class='card'>
        <div class='card-body'>
            <form action="{{route('ed-edit')}}" method='post'>
                @csrf
                <label for="">Waktu mulai</label>
                <input type="time" class='form-control' id='start' name='start' value='{{$data[0]->start}}'>

                <label for="">Waktu selesai</label>
                <input type="time" class='form-control' id='end' name='end' value='{{$data[0]->end}}'>

                <button class='btn btn-primary' type='submit'>Simpan</button>
            </form>
        </div>
    </div>

@endsection
