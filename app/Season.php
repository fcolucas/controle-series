<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    // command: php artisan make:model Season -m

    public $timestamps = false;
    protected $fillable = ['number'];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getWatchedEpisodes(): Collection
    {
        return $this->episodes->filter(function (Episode $episode) {
            return $episode->watched;
        });
    }
}
