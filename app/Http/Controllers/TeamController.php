<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TeamController extends Controller
{
    /**
     * Menampilkan daftar semua tim di mana pengguna terdaftar.
     */
    public function index(): View
    {
        // Mengambil user yang sedang login, lalu mengambil semua tim yang terhubung dengannya
        $teams = Auth::user()->teams()->latest()->get();

        // Mengembalikan view 'teams.index' dan mengirimkan data tim
        return view('teams.index', ['teams' => $teams]);
    }

    /**
     * Menampilkan formulir untuk membuat tim baru.
     */
    public function create(): View
    {
        // Hanya menampilkan halaman formulir
        return view('teams.create');
    }

    /**
     * Menyimpan tim baru ke dalam database.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input: nama tim wajib diisi
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();

        // 2. Menggunakan DB Transaction untuk memastikan integritas data
        // Jika salah satu proses gagal, semua akan dibatalkan (rollback).
        DB::transaction(function () use ($request, $user) {
            // 2a. Buat record baru di tabel 'teams'
            $team = Team::create([
                'name' => $request->name,
                'owner_id' => $user->id,
            ]);

            // 2b. Hubungkan user yang membuat sebagai anggota tim di tabel pivot 'team_user'
            // dengan peran sebagai 'owner'.
            $user->teams()->attach($team->id, ['role' => 'owner']);
        });

        // 3. Redirect ke halaman daftar tim dengan pesan sukses
        return redirect()->route('teams.index')->with('success', 'Tim baru berhasil dibuat!');
    }
}