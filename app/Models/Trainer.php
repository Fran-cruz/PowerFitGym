<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    /** @use HasFactory<\Database\Factories\TrainerFactory> */
    use HasFactory;

    protected $table = 'trainers';

    protected $fillable = [
        'name',
        'specialty',
        'certifications',
        'years_experience',
        'biography',
        'image_url',
        'is_active',
        'sort_order',
    ];
}
