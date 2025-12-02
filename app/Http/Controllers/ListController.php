<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\TList;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    /**
     * Menyimpan List (kolom) baru ke dalam sebuah proyek.
     *
     * @param Request $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function store(Request $request, Project $project): RedirectResponse
    {
        // 1. Otorisasi: Pastikan pengguna adalah anggota tim dari proyek ini.
        if (!Auth::user()->teams->contains($project->team)) {
            abort(403, 'AKSES DITOLAK');
        }

        // 2. Validasi: Nama kolom wajib diisi.
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        // 3. Logika Posisi: Tentukan posisi untuk kolom baru (selalu di akhir).
        // Ambil posisi maksimal saat ini, jika tidak ada, mulai dari 0.
        $maxPosition = $project->lists()->max('position');
        $newPosition = $maxPosition === null ? 1 : $maxPosition + 1;

        // 4. Buat record baru di database.
        $project->lists()->create([
            'name' => $validated['name'],
            'position' => $newPosition,
        ]);

        // 5. Redirect kembali ke halaman proyek dengan pesan sukses.
        return redirect()->route('projects.show', $project)->with('success', 'Kolom baru berhasil ditambahkan!');
    }
}