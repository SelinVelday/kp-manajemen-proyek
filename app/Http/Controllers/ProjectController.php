<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Menampilkan formulir untuk membuat proyek baru di dalam sebuah tim.
     *
     * @param Team $team
     * @return View
     */
    public function create(Team $team): View
    {
        // TODO: Tambahkan otorisasi untuk memastikan hanya anggota tim yang bisa membuat proyek.

        return view('projects.create', ['team' => $team]);
    }

    /**
     * Menyimpan proyek baru ke database.
     *
     * @param Request $request
     * @param Team $team
     * @return RedirectResponse
     */
    public function store(Request $request, Team $team): RedirectResponse
    {
        // TODO: Tambahkan otorisasi.

        // Validasi input dari formulir
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        // Buat proyek baru melalui relasi dari model Team
        // Ini secara otomatis akan mengisi 'team_id'.
        $project = $team->projects()->create($validated);

        // Redirect ke halaman detail proyek yang baru dibuat dengan pesan sukses
        return redirect()->route('projects.show', $project)->with('success', 'Proyek baru berhasil dibuat!');
    }

    /**
     * Menampilkan halaman detail proyek (nantinya akan menjadi Papan Kanban).
     *
     * @param Project $project
     * @return View
     */
    public function show(Project $project): View
    {
        // Otorisasi: Pastikan pengguna yang login adalah anggota dari tim yang memiliki proyek ini.
        if (!Auth::user()->teams->contains($project->team)) {
            abort(403, 'AKSES DITOLAK');
        }

        // Eager load relasi 'lists' dan 'cards' untuk efisiensi query database
        $project->load('lists.cards');

        return view('projects.show', ['project' => $project]);
    }
}