<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'street',
        'building_number',
        'city',
        'postcode',
        'telephone',
        'facebook',
        'instagram',
        'email',
        'website',
        'discount',
        'created_at',
        'updated_at',
    ];
}
