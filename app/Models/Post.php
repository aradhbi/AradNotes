<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'content',
        'views',
        'category_id',
        'is_published',
        'slug',
        'image',
        'meta_description',
        'meta_keywords'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getCreatedAtJalaliAttribute()
    {
        return verta($this->created_at)->format('Y/n/j - H:i');
    }

}
