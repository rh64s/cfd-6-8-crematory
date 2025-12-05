<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'cremation_date',
        'urn_delivery_place',
        'cancellation_reason',
    ];
    public const CREATED_AT = 'creation_date';
    protected $casts = [
        'updated_at' => 'datetime',
        'creation_date' => 'datetime',
        'status' => 'string',
    ];
}
