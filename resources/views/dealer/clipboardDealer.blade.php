{{-- tak buat dulu tinggal tak copas nti ke front-end e (PROTOTYPE) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clipboard Dealer</title>
</head>

<body>
    <h3>Team Name :</h3>
    <select id="teamName">
        @for ($x = 0; $x < count($pemain); $x++)
            <option value="{{ $pemain[$x]->id }}">{{ str_replace('_', ' ', $pemain[$x]->name) }}</option>
        @endfor
    </select>

    <h3>Kartu Utuh:</h3>
    <div id="listUtuh">
        {{-- kosong --}}
        @for ($x = 0; $x < count($kartu); $x++)
            <img src="{{ asset('/asset/img/' . $kartu[$x]->gambar . '.png') }}" class="card-img-top">
        @endfor
    </div>

    {{-- <h3>Kartu Potongan:</h3>
    <div id="listPotongan" class="owl-carousel owl-theme mt-2">
        kosong
    </div> --}}

    <script src="{{ asset('template/assets/js/theme.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/owl.carousel.min.js') }}"></script>

    <script>
        $('#teamName').change(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('dealer.change') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': $(this).val()
                },
                success: function(data) {
                    // alert('success');

                    $('#listUtuh').empty();
                    $.each(data.utuh, function(key, value) {
                        $('#listUtuh').append(
                            `<img src="{{ asset('/asset/img/${data.utuh[key].gambar}.png') }}" class="card-img-top">`
                        );
                    })

                    // $.each(data.utuh, function(key, value) {
                    //     $("#listUtuh").trigger('remove.owl.carousel', [key]).trigger(
                    //         'refresh.owl.carousel');
                    // })

                    // $.each(data.utuh, function(key, value) {
                    //     $('#listUtuh')
                    //         .trigger('add.owl.carousel', [
                    //             `<div class="item">
                //             <div class="card border-0 shadow ">
                //                 <img src="{{ asset('/asset/img/${data.utuh[key].gambar}.png') }}" class="card-img-top">
                //             </div>
                //             <h6>${data.utuh[key].namaKartu.replace('_', ' ')}</h6>
                //         </div>`
                    //         ]).trigger('refresh.owl.carousel');
                    // })

                    // $.each(data.potongan, function(key, value) {
                    //     $("#listPotongan").trigger('remove.owl.carousel', [key]).trigger(
                    //         'refresh.owl.carousel');
                    // })

                    // $.each(data.potongan, function(key, value) {
                    //     $('#listPotongan')
                    //         .trigger('add.owl.carousel', [
                    //             `<div class="item">
                //                 <div class="card border-0 shadow ">
                //                     <img src="{{ asset('/asset/img/${data.potongan[key].gambar}.png') }}" class="card-img-top kartu-potongan">
                //                 </div>
                //                 <h6>${data.potongan[key].namaKartu.replace('_', ' ')}</h6>
                //             </div>`
                    //         ]).trigger('refresh.owl.carousel');
                    // })
                },
                error: function() {
                    alert('error');
                }
            })
        })
    </script>
</body>

</html>
