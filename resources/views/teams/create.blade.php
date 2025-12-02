@extends('layouts.app')

@section('content')
    {{-- Header Halaman --}}
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Buat Tim Baru</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dasbor</a></li>
                <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Tim</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat Baru</li>
            </ol>
        </div>
    </div>

    {{-- Konten Utama: Formulir --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Formulir Tim Baru</div>
                    <hr>
                    <form action="{{ route('teams.store') }}" method="POST">
                        @csrf  {{-- Token Keamanan --}}
                        
                        <div class="form-group">
                            <label for="name">Nama Tim</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   placeholder="Masukkan Nama Tim">
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a href="{{ route('teams.index') }}" class="btn btn-light px-5">Batal</a>
                            <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i> Simpan Tim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection