<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transport extends Model
{

    protected $fillable = [
        "transport_name",
        "description",
        "transport_type",
        "cost",
    ];


    public function pakets(): HasMany
    {
        return $this->hasMany(Packet::class);
    }

    public function destinations(): BelongsToMany
    {
        return $this->belongsToMany(Destination::class, 'destination_transport');
    }
}
