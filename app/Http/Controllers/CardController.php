<?php

namespace App\Http\Controllers;

use App\Models\TList; // Gunakan model TList yang sudah kita buat
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /**
     * Menyimpan Card (kartu tugas) baru ke dalam sebuah List (kolom).
     *
     * @param Request $request
     * @param TList $list
     * @return RedirectResponse
     */
    public function store(Request $request, TList $list): RedirectResponse
    {
        // 1. Otorisasi: Pastikan pengguna memiliki akses ke proyek dari list ini.
        if (!Auth::user()->teams->contains($list->project->team)) {
            abort(403, 'AKSES DITOLAK');
        }

        // 2. Validasi: Judul kartu tugas wajib diisi.
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        // 3. Logika Posisi: Tentukan posisi untuk kartu baru (selalu di akhir kolom).
        $maxPosition = $list->cards()->max('position');
        $newPosition = $maxPosition === null ? 1 : $maxPosition + 1;

        // 4. Buat record baru di database.
        $list->cards()->create([
            'title' => $validated['title'],
            'creator_id' => Auth::id(), // ID pengguna yang membuat kartu ini
            'position' => $newPosition,
        ]);

        // 5. Redirect kembali ke halaman proyek dengan pesan sukses.
        return redirect()->route('projects.show', $list->project)->with('success', 'Tugas baru berhasil ditambahkan!');
    }
}