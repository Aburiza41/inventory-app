<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'phone_1',
        'phone_2',
        'phone_3',
        'code',
        'nor_rek',
        'bank_name',
        'email',
        'address',
        'corporate',
        'desc',
    ];
}
