<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $slug = Str::slug($value, '-');
        $this->attributes['slug'] =  $slug . Str::random(Str::length($value));
    }
    
    public function getRouteKeyName()
    {
        
        return 'slug';
    }

}
