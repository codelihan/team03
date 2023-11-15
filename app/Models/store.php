<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable=[
        'id',
        'name',
        'country',
        'service',
        'info',
        'url',
        'created_at',
        'updated_at'
    ];
}
