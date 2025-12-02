<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id', 'name'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // Relasi Many-to-Many Custom
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_user')
                    ->withPivot('role_id', 'joined_at')
                    ->using(TeamUser::class); // Menggunakan model pivot kustom kita
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}