<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupClass extends Model
{
    /** @use HasFactory<\Database\Factories\GroupClassFactory> */
    use HasFactory;

    protected $table = 'group_classes';

    protected $fillable = [
        'training_area_id',
        'name',
        'description',
        'instructor_name',
        'day_of_week',
        'start_time',
        'end_time',
        'is_active',
    ];

    public function trainingArea(): BelongsTo
    {
        return $this->belongsTo(TrainingArea::class);
    }
}
