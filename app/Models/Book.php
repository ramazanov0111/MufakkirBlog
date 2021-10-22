<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    protected $bookTypes = ['arabic', 'russian', 'child'];
    protected $table = 'books';

    public function types()
    {
        return $this->bookTypes;
    }

    protected $fillable = [
        'title', 'slug', 'author', 'description', 'image', 'file', 'type', 'published', 'downloads',
        'created_by', 'modified_by'
    ];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

}
