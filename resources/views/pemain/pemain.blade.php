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

    {{-- CDN JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <h4>Nama Team: {{ $kartu_pemain[0]->namaPemain }}</h4>
    <h3>Kartu</h3>
    <ul>
        @for ($x = 0; $x < count($kartu_pemain); $x++)
            <li>
                <h4>Nama: {{ str_replace('_', ' ', $kartu_pemain[$x]->namaKartu) }}</h4>
                <h4>Gambar: {{ $kartu_pemain[$x]->gambar }}</h4>
            </li>
        @endfor
    </ul>

    <button type="button" id="tukarKartu">Tukar Kartu</button>

    {{-- Modal --}}
    <div class="modal fade" id="Konfirmasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="KonfirmasiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="KonfirmasiLabel">Upgrade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                    <button id="random">Random</button>
                    <button id="pilih">Pilih</button>
                    <button id="spesial">Spesial</button>
                </div>
                <div class="modal-footer">
                    {{-- button cancel --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    {{-- button konfirmasi upgrade --}}
                    <button type="button" class="btn btn-success" id="konfirmasi_upgrade"
                        data-bs-dismiss="modal">Upgrade</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#tukarKartu').click(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.check.potongan') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>'
                },
                success: function(data) {
                    alert('success');
                    let jumlahPotongan = count(data.potongan)

                    if (jumlahPotongan < 5) {
                        $('#pilih').attr('disable');
                    } else if (jumlahPotongan < 3) {
                        $('#random').attr('disable');
                    }
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
                    'pilihan': 'random'
                },
                success: function() {
                    alert('success');

                },
                error: function() {
                    alert('error');

                }
            })
        })

        //  kalau button pilih diklik
        $('#pilih').click(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.tukar') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'pilihan': 'pilih'
                },
                success: function() {
                    alert('success');

                },
                error: function() {
                    alert('error');

                }
            })
        })

        // kalau button spesial diklik
        $('#spesial').click(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('pemain.tukar') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'pilihan': 'spesial'
                },
                success: function() {
                    alert('success');

                },
                error: function() {
                    alert('error');

                }
            })
        })
    </script>
</body>

</html>
