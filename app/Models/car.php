<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'store',
        'model',
        'riding_noise',
        'idle_noise',
        'max_power',
        'mas_rpm',
        'displacement',
        'created_at',
        'updated_at'
    ];
    public function store()
    {
        return $this->belongsTo('App\Models\store','store','name');

    }

}
