<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content'];

    public function setSlugAttribute($value)
    {
        $slug = Str::slug($value);

        $originalSlug = $slug;
        $count = 1;

        while ($this->slugExists($slug)) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $this->attributes['slug'] = $slug;
    }

    protected function slugExists($slug)
    {
        return static::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists();
    }
}
