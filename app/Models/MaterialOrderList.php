<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialOrderList extends Model
{
    use HasFactory;
    public function material_order()
    {
        // HasOne
        return $this->belongsTo(MaterialOrder::class);
    }
}
