@extends('layouts.penpos')

@section('penpos_content')
<div class="container card-pad">
    <div class="card p-4" style="border: 1px solid #242a68">
        <div class="row g-0 text-center align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('template/assets/img/logoMOB.png') }}" class="img-fluid logo">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="form-floating">
                        @csrf
                        <h2 class="text-mob mb-3"><b>Masuk</b></h2>
                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus placeholder="email" >
                            <label for="email"><span><i class="fas fa-address-book"></i></span>{{ __(' E-Mail Address') }}</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-floating">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                            <label for="password"><span><i class="fas fa-lock"></i></span>{{ __(' Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-md-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-primary btn-masuk">
                                        {{ __('Masuk') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
