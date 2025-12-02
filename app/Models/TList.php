<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TList extends Model
{
    use HasFactory;

    /**
     * Nama tabel harus didefinisikan secara eksplisit 
     * karena nama class berbeda dari konvensi ('lists').
     */
    protected $table = 'lists';

    protected $fillable = ['name', 'position', 'project_id'];

    /**
     * Relasi: Sebuah List dimiliki oleh sebuah Proyek.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relasi: Sebuah List memiliki banyak Kartu.
     */
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class, 'list_id');
    }
}