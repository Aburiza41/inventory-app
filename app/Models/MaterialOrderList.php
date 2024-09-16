<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialOrderList extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'material_order_id',
        'project_material_list_id',
        'material_id',
        'code',
        'date',
        'brand',
        'brand_description',
        'length',
        'width',
        'thick',
        'weight',
        'price',
        'discount',
        'buy_quantity',
        'current_quantity',
    ];

    public function material_order()
    {
        // HasOne
        return $this->belongsTo(MaterialOrder::class);
    }

    public function projectMaterialList()
    {
        // HasOne
        return $this->belongsTo(ProjectMaterialList::class);
    }
}
