<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'position',
        'due_date',
        'list_id',
        'creator_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'due_date' => 'datetime',
    ];

    /**
     * Relasi: Sebuah Kartu dimiliki oleh sebuah List.
     */
    public function list(): BelongsTo
    {
        return $this->belongsTo(TList::class, 'list_id');
    }

    /**
     * Relasi: Sebuah Kartu dibuat oleh seorang User.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Relasi: Sebuah Kartu bisa ditugaskan ke banyak User (Assignees).
     */
    public function assignees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'card_user');
    }

    /**
     * Relasi: Sebuah Kartu memiliki banyak Komentar.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}