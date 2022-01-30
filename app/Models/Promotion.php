<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promotion extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'start_on',
        'end_on'
    ];

    /**
     * Get the user that owns the Promotion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function promotionCategory(): BelongsTo
    {
        return $this->belongsTo(PromotionCategory::class, 'promotion_categories_id');
    }
}
