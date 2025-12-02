<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'owner_id'];

    /**
     * Relasi: Sebuah Tim dimiliki oleh seorang User.
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Relasi: Sebuah Tim memiliki banyak Anggota (User).
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_user')->withPivot('role');
    }

    /**
     * Relasi: Sebuah Tim memiliki banyak Proyek.
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}