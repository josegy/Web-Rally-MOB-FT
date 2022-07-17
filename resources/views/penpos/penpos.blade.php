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
    <h4>Nama Penpos: </h4>
    <h3>Kartu</h3>
    <ul>
        {{-- @for ($x = 0; $x < count($kartu_pemain); $x++)
            <li>
                <h4>Nama: {{ str_replace('_', ' ', $kartu_pemain[$x]->namaKartu) }}</h4>
                <h4>Gambar: {{ $kartu_pemain[$x]->gambar }}</h4>
            </li>
        @endfor --}}
    </ul>

    <button type="button" id="tukarKartu" class="btn btn-warning">Tukar Kartu</button>

    {{-- Modal --}}
    <div class="modal fade" id="tukar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="tukarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tukarLabel">Upgrade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex">
                    <button id="random" class="btn btn-secondary">Random</button>
                    <button id="pilih" class="btn btn-secondary">Pilih</button>
                    <button id="spesial" class="btn btn-secondary">Spesial</button>
                </div>
                <div class="modal-footer">
                    {{-- button cancel --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
</body>

</html>
