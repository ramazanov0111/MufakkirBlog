<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    // Mass assigned
    protected $fillable = ['title', 'slug', 'description', 'body', 'image', 'image_show', 'meta_title',
        'meta_description', 'meta_keyword', 'published', 'created_by', 'modified_by'];

    // Mutators
    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    //Polimorphic ralation with categories
    public function categories()
    {
        return $this->morphToMany('App\Models\Category', 'categoryable');
    }

    public function scopeLastPosts($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
