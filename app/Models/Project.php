<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'uuid',
        'title',
        'code',
        'status',
    ];

    public function owner()
    {
        // HasOne
        return $this->belongsTo(Owner::class);
    }

    public function project_material_lists()
    {
        // HasOne
        return $this->hasMany(ProjectMaterialList::class, 'project_id' , 'id');
    }

    // public function material_order_lists()
    // {
    //     // HasOne
    //     return $this->hasMany(MaterialOrderList::class, 'project_id', 'id');
    // }
}
