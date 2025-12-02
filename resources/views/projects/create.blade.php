@extends('layouts.app')

@section('content')
    {{-- Header Halaman --}}
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Buat Proyek Baru</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dasbor</a></li>
                <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Tim</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat Proyek Baru untuk Tim: {{ $team->name }}</li>
            </ol>
        </div>
    </div>

    {{-- Konten Utama: Formulir --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Formulir Proyek Baru</div>
                    <hr>
                    {{-- Arahkan form ke rute projects.store dengan parameter team --}}
                    <form action="{{ route('projects.store', $team) }}" method="POST">
                        @csrf  {{-- Token Keamanan --}}
                        
                        {{-- Input Nama Proyek --}}
                        <div class="form-group">
                            <label for="name">Nama Proyek</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   placeholder="Masukkan Nama Proyek" required>
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Input Deskripsi Proyek --}}
                        <div class="form-group">
                            <label for="description">Deskripsi (Opsional)</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4">{{ old('description') }}</textarea>
                            
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a href="{{ route('teams.index') }}" class="btn btn-light px-5">Batal</a>
                            <button type="submit" class="btn btn-light px-5"><i class="icon-folder"></i> Simpan Proyek</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection