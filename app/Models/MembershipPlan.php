<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    /** @use HasFactory<\Database\Factories\MembershipPlanFactory> */
    use HasFactory;

    protected $table = 'membership_plans';

    protected $fillable = [
        'name',
        'price',
        'billing_period',
        'badge',
        'badge_type',
        'savings_text',
        'button_text',
        'benefits',
        'is_featured',
        'is_active',
        'sort_order',
    ];
}
