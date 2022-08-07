@extends('layouts.penpos')
@section('style')
<style>
    #halHistory, #halUtama:hover {
        color: #5179DF;
    }

    #halUtama{
        color: #343F52;
    }
</style>
@endsection

@section('penpos_content')
    <div class="container pt-10 pt-md-14">
        <div class="card">
            <div class="card-body">
                <table id="tabel" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Pos</th>
                            <th>Nama Tim</th>
                            <th>Status</th>
                            <th>Jam Ditambah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($historyPenpos) != 0)
                            @foreach ($historyPenpos as $history)
                                <tr>
                                    <td>{{ $penpos->name }}</td>
                                    <td>{{ $history->namaPemain }}</td>
                                    <td>{{ $history->pivot->result }}</td>
                                    <td>{{ $history->waktuDapat }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('template/assets/js/theme.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery-3.6.0.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#tabel').DataTable({
                select: true
            });
        });
    </script>
@endsection