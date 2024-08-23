<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

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
}
