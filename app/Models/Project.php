<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Konfigurasi Primary Key String
    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'team_id', 'name', 'description', 'status', 'due_date'
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    // Boot function untuk Auto-Generate ID
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->id)) {
                $year = now()->year;
                // Cari project terakhir di tahun ini: P-2025-XXX
                $latest = self::where('id', 'like', "P-{$year}-%")
                              ->orderBy('id', 'desc')
                              ->first();

                if ($latest) {
                    // Ambil 3 digit terakhir, ubah jadi int, tambah 1
                    $number = intval(substr($latest->id, -3)) + 1;
                } else {
                    $number = 1;
                }

                // Format ulang jadi P-YYYY-XXX
                $project->id = sprintf("P-%s-%03d", $year, $number);
            }
        });
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function lists()
    {
        // Sesuaikan nama model List Anda (bisa TList atau List)
        return $this->hasMany(TList::class, 'project_id')->orderBy('position');
    }
}