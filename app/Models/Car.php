<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function store()
    {
        return $this->belongsTo('App\Models\Store', 'sid', 'id');
    }

    // 選擇白牌車輛(displacement<250)
    public function writeLicene($query)
    {
        return $query->where('displacement', '<', 250)->orderBy('displacement', 'asc');
    }

    // 選擇黃牌車輛(displacement>250<550)
    public function yellowLicene($query)
    {
        return $query->where('displacement', '>', 250)->where('displacement', '<', 550)->orderBy('displacement', 'asc');
    }

    // 選擇紅牌車輛(displacement>550)
    public function redLicene($query)
    {
        return $query->where('displacement', '>', 550)->orderBy('displacement', 'asc');
    }
}
