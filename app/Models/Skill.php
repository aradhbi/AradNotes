<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['about_id', 'title'];

    public function about()
    {
        return $this->belongsToMany(About::class);
    }
}
