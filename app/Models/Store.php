<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'country',
        'service',
        'info',
        'url',
        'created_at',
        'updated_at'
    ];
<<<<<<< HEAD:app/Models/store.php
    public function car()
    {
        return $this->hasMany('App\Models\car','store');

=======

    public function cars(){
        return $this->hasMany('App\Models\Car','sid');
    }

    public function delete()
    {
        $this->cars()->delete();
        return parent::delete();
>>>>>>> D1094181709:app/Models/Store.php
    }
}
