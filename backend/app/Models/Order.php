<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public $timestamps = true;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'cremation_date',
        'urn_delivery_place',
        'cancellation_reason',
        'confirmed_at',
        'in_progress_at',
        'completed_at',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'cremation_date' => 'datetime',
        'urn_delivery_place' => 'string',
        'cancellation_reason' => 'string',
        'confirmed_at' => 'datetime',
        'in_progress_at' => 'datetime',
        'completed_at' => 'datetime',

    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function service(): HasMany
    {
        return $this->hasMany(OrderService::class);
    }

    public const STATUSES = [
        'pending',
        'confirmed',
        'cancelled',
        'in_progress',
        'completed',
    ];
}
