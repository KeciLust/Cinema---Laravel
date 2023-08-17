<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class film_hall extends Pivot

{
    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = ['time'];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
