<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    protected $fillable = ['title', 'summary', 'text', 'mission', 'vision', 'values', 'image'];
}
