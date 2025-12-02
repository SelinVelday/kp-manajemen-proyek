<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function teamUsers()
    {
        return $this->hasMany(TeamUser::class);
    }
}