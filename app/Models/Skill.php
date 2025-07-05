<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'logo',
        'proficiency_level',
        'description',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'proficiency_level' => 'integer',
        'sort_order' => 'integer'
    ];

    // Konstanta untuk kategori
    public const CATEGORIES = [
        'backend' => 'Backend',
        'frontend' => 'Frontend',
        'database' => 'Database',
        'tools' => 'Tools',
        'mobile' => 'Mobile',
        'devops' => 'DevOps'
    ];

    // Konstanta untuk level proficiency
    public const PROFICIENCY_LEVELS = [
        1 => 'Beginner',
        2 => 'Basic',
        3 => 'Intermediate',
        4 => 'Advanced',
        5 => 'Expert'
    ];

    // Accessor untuk category label
    public function getCategoryLabelAttribute()
    {
        return self::CATEGORIES[$this->category] ?? $this->category;
    }

    // Accessor untuk proficiency label
    public function getProficiencyLabelAttribute()
    {
        return self::PROFICIENCY_LEVELS[$this->proficiency_level] ?? 'Unknown';
    }

    // Scope untuk filter berdasarkan kategori
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Scope untuk skill yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk ordering
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
