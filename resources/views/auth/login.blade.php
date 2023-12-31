@extends('layouts.app')
@section('title', 'Masuk')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Masuk</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="nik" class="col-md-4 col-form-label text-md-right">NIK</label>
                        <div class="col-md-8">
                            <input id="nik" type="number" class="form-control @error('nik') is-invalid @enderror"
                                name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Kata Sandi</label>
                        <div class="col-md-8">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Masuk
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lupa kata sandi Anda?
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
