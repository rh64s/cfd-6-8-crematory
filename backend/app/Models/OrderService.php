<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    protected $table = 'order_services';
    protected $fillable = [
        'order_id',
        'service_id',
        'quantity',
        'price_at_time'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
