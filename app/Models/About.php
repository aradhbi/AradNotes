<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /** @use HasFactory<\Database\Factories\AboutFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image'
    ];
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class);
    }
}
