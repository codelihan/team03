<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'sid',
        'model',
        'riding_noise',
        'idle_noise',
        'max_power',
        'max_rpm',
        'displacement',
        'created_at',
        'updated_at'
    ];

    public function store(){
        return $this->belongsTo('App\Models\Store','sid','id');
    }
}
