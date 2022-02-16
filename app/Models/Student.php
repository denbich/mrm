<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'school_id',
        'card_id',
        'firstname',
        'lastname',
        'pesel',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function school()
    {
        return $this->hasOne(School::class, 'id', 'school_id');
    }

    public function card()
    {
        return $this->hasOne(Card::class, 'id', 'card_id');
    }
}
