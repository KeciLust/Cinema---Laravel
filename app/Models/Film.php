<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Film extends Model

{
    protected $fillable = ['name', 'lenght', 'country', 'description'];

    public function halls()
    {
        return $this->belongsToMany(Hall::class)->as('time')->withPivot('time');
    }
}
