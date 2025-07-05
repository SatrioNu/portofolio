<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'image', 'link'];

    // Accessor untuk image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : null;
    }

    // Boot method untuk membuat folder jika belum ada
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Buat folder jika belum ada
            if (!Storage::disk('public')->exists('project-images')) {
                Storage::disk('public')->makeDirectory('project-images');
            }
        });
    }
}
