{{-- tak buat dulu tinggal tak copas nti ke front-end e (PROTOTYPE) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Pemain</title>

    {{-- CDN Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- CDN Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- CDN JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <h4>Nama Team: {{ Auth::user()->pemain->name }}</h4>
    <h3>Kartu</h3>
    <h4>Utuh:</h4>
    <ul id="listUtuh" style="display: flex; list-style: none">
        @for ($x = 0; $x < count($utuh); $x++)
            <li>
                <h4 style="text-align: center">{{ str_replace('_', ' ', $utuh[$x]->namaKartu) }}</h4>
                <img src="{{ asset('/asset/img/' . $utuh[$x]->gambar . '.png') }}" alt="">
            </li>
        @endfor
    </ul>
    <h4>Potongan:</h4>
    <ul id="listPotongan" style="display: flex; list-style: none">
        @for ($x = 0; $x < count($potongan); $x++)
            <li>
                <h4 style="text-align: center">{{ str_replace('_', ' ', $potongan[$x]->namaKartu) }}</h4>
                <img src="{{ asset('/asset/img/' . $potongan[$x]->gambar . '.png') }}" alt="">
            </li>
        @endfor
    </ul>

    <button type="button" id="tukarKartu" class="btn btn-warning">Tukar Kartu</button>
    <button type="button" id="clearStorage" class="btn btn-warning">Clear Storage</button>

    {{-- Modal --}}
    {{-- Modal Konfirmasi Tukar --}}
    <div class="modal fade" id="tukar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="tukarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tukarLabel">Tukar Kartu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                    <button id="random" class="btn btn-secondary" data-bs-dismiss="modal">Random</button>
                    <button id="pilih" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#choose">Pilih</button>
                    <button id="spesial" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#special">Spesial</button>
                </div>
                <div class="modal-footer">
                    {{-- button cancel --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
                    <select id="selectKartu">
                        @foreach ($selectKartu as $sk)
                            <option value="{{ $sk->namaKartu }}">{{ str_replace('_', ' ', $sk->namaKartu) }}
                            </option>
                        @endforeach
                    </select><br><br>
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

    <script>
        let special = localStorage.getItem('special');
        $('#tukarKartu').click(function() {
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
            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.tukar') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'tipe': 'spesial',
                    'kartu': $('#selectKartu').val(),
                    'specialCard': $('#specialCard').val()
                },
                success: function(data) {
                    // alert('success');
                    console.log(data.card);
                    let cardName = data.card.name.replace('_', ' ');

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

        $('#clearStorage').click(function() {
            localStorage.removeItem('special');
            console.log(localStorage.getItem('special'));
        })
    </script>
</body>

</html>
