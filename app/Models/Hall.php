<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $fillable = ['name', 'chairs', 'price', 'priceVip', 'row', 'chair'];
    public function films()
    {
        return $this->belongsToMany(Film::class)->as('time')->withPivot('time');
    }
}
