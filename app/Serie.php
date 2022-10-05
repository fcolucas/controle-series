<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    // command: php artisan make:model Serie -m
    public $timestamps = false;

    protected $fillable = ['name'];

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
}
