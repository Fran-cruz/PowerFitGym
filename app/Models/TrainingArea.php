<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingArea extends Model
{
    /** @use HasFactory<\Database\Factories\TrainingAreaFactory> */
    use HasFactory;

    protected $table = 'training_areas';

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'equipment',
        'is_active',
        'sort_order',
    ];

    public function groupClasses(): HasMany
    {
        return $this->hasMany(GroupClass::class);
    }
}
