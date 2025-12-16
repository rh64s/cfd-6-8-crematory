<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    public $timestamps = false;
    protected $table = 'documents';
    protected $fillable = [
        'order_id',
        'document_type',
        'file_path'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'uploaded_by_admin' => 'boolean',
    ];
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
