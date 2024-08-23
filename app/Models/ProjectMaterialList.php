<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMaterialList extends Model
{
    use HasFactory;


    public function project()
    {
        // HasOne
        return $this->belongsTo(Project::class);
    }

    public function material()
    {
        // HasOne
        return $this->belongsTo(Material::class);
    }

    public function material_order_list()
    {
        // HasOne
        return $this->hasOne(MaterialOrderList::class);
    }
}
