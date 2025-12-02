@extends('layouts.app')

@section('content')
    {{-- Header Halaman --}}
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">{{ $project->name }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dasbor</a></li>
                <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Tim</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $project->name }}</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button type="button" class="btn btn-light waves-effect waves-light" data-toggle="modal" data-target="#addListModal">
                    <i class="fa fa-plus-circle mr-1"></i> Tambah Kolom Baru
                </button>
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
    
    {{-- Deskripsi Proyek --}}
    @if ($project->description)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Konten Utama: Papan Kanban --}}
    <div class="row">
        @forelse ($project->lists as $list)
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-header text-white bg-transparent">{{ $list->name }}</div>
                    <div class="card-body">
                        {{-- Daftar Kartu Tugas di dalam Kolom --}}
                        @forelse ($list->cards as $card)
                            <div class="card card-tasks">
                                <div class="card-body">
                                    <p class="card-title">{{ $card->title }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted small"><em>Belum ada tugas.</em></p>
                        @endforelse

                        {{-- Formulir Tambah Kartu Cepat --}}
                        <form action="{{ route('cards.store', $list) }}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" class="form-control form-control-sm" placeholder="+ Tambah tugas baru" required>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <p>Papan Kanban masih kosong. Silakan buat kolom pertama Anda!</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <style>
    .card-tasks { border: 1px solid rgba(255, 255, 255, 0.1); margin-bottom: 10px; background-color: rgba(255, 255, 255, 0.05); }
    .card-tasks .card-title { margin-bottom: 0; }
    </style>

    {{-- ======================================================= --}}
    {{-- == INI ADALAH BAGIAN MODAL YANG SEHARUSNYA TIDAK KOSONG == --}}
    {{-- ======================================================= --}}
    <div class="modal fade" id="addListModal">
        <div class="modal-dialog">
            <div class="modal-content border-light">
                <div class="modal-header bg-light">
                    <h5 class="modal-title text-white"><i class="fa fa-plus"></i> Buat Kolom Baru</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lists.store', $project) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Kolom</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Contoh: To Do" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-light px-5"><i class="icon-check"></i> Simpan</button>
                            <button type="button" class="btn btn-light px-5" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection