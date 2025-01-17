<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'video',
        'category',
        'cal',
        'duration',
        'overview',
        'kcal',
        'views_count',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($workout) {
            if (empty($workout->slug)) {
                $workout->slug = Str::slug($workout->title, '-');
            }
        });

        static::updating(function ($workout) {
            if ($workout->isDirty('title')) {
                $workout->slug = Str::slug($workout->title, '-');
            }
        });
    }
}
