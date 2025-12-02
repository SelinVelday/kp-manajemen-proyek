<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'card_id'];

    /**
     * Relasi: Sebuah Komentar dibuat oleh seorang User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Sebuah Komentar dimiliki oleh sebuah Kartu.
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}