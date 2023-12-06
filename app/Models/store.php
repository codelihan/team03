<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;

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
    public function car()
    {
        return $this->hasMany('App\Models\car','store');

    }
}
