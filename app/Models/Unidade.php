<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = ['name', 'code', 'city', 'active'];

    protected function casts(): array
    {
        return ['active' => 'boolean'];
    }
}
