@extends('layouts.app')

@section('content')
    {{-- Header Halaman --}}
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Daftar Tim Anda</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dasbor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tim</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{ route('teams.create') }}" class="btn btn-light waves-effect waves-light">
                    <i class="fa fa-plus-circle mr-1"></i> Buat Tim Baru
                </a>
            </div>
        </div>
    </div>

    {{-- Pesan Sukses (jika ada) --}}
    @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div class="alert-icon">
            <i class="fa fa-check"></i>
        </div>
        <div class="alert-message">
            <span><strong>Sukses!</strong> {{ session('success') }}</span>
        </div>
    </div>
    @endif


    {{-- Konten Utama: Daftar Tim --}}
    <div class="row">
        @forelse ($teams as $team)
            <div class="col-12 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-users"></i> {{ $team->name }}</h5>
                        <p class="card-text">
                            Dimiliki oleh: {{ $team->owner->name }} <br>
                            Jumlah Anggota: {{ $team->members->count() }}
                        </p>
                        <hr>
                        <a href="#" class="btn btn-light">Lihat Proyek</a>
                        <a href="{{ route('projects.create', $team) }}" class="btn btn-light">
                            <i class="fa fa-plus"></i> Buat Proyek
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <p>Anda belum menjadi anggota tim manapun.</p>
                        <a href="{{ route('teams.create') }}" class="btn btn-primary">Buat Tim Pertama Anda</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection