<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable=[
        'name',
        'country',
        'service',
        'info',
        'url',
        'created_at',
        'updated_at'
    ];

    public function cars(){
        return $this->hasMany('App\Models\Car','id');
    }

    public function delete()
    {
        $this->cars()->delete();
        return parent::delete();
    }
}
