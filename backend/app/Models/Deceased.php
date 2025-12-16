<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deceased extends Model
{
    public $table = 'deceased';
    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'patronymic',
        'date_of_birth',
        'date_of_death',
        'cause_of_death',
        'comment',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'date_of_birth' => 'date',
        'date_of_death' => 'date',
        'cause_of_death' => 'string',
        'comment' => 'string',
    ];
    protected static function booted()
    {
        static::creating(function (self $deceased) {
            $deceased->created_at = now();
        });
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
