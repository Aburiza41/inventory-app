<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialOrder extends Model
{
    use HasFactory;

    public function supplier()
    {
        // HasOne
        return $this->belongsTo(Supplier::class);
    }
}
