<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supplier_id',
        'uuid',
        'image',
        'description',
        'status',
        'buyer_name',
        'buyer_phone',
        'buyer_address',
        'buyer_corporate',
        'buyer_number_invoice',
        'purchase_date',
        'due_date',
        'purchase_payment',
        'purchase_price',
        'purchase_current',
    ];

    public function supplier()
    {
        // HasOne
        return $this->belongsTo(Supplier::class);
    }
}
