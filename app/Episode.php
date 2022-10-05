<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    // command: php artisan make:model Episode -m
    public $timestamps = false;
    protected $fillable = ['number'];

    public function seasons()
    {
        return $this->belongsTo(Season::class);
    }
}
