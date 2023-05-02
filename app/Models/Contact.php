<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'avatar',
        'phone_number',
        'address',
        'group_id'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
