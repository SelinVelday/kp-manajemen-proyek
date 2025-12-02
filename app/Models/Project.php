<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'team_id'];

    /**
     * Relasi: Sebuah Proyek dimiliki oleh sebuah Tim.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Relasi: Sebuah Proyek memiliki banyak List (Kolom).
     */
    public function lists(): HasMany
    {
        return $this->hasMany(TList::class);
    }
}