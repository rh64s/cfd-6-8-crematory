<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
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

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    protected $casts = [
        'date_of_birth' => 'date',
        'date_of_death' => 'date',
        'created_at' => 'datetime',
    ];

}
