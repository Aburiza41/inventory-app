<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialOrderListHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_order_list_id',
        'user_id',
        'title',
        'desc',
    ];
}
