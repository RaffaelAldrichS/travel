<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        "destination_name",
        "description",
        'location',
        'entrance_fee',
        'image'
    ];

    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class);
    }
    public function transports(): HasMany
    {
        return $this->hasMany(Transport::class);
    }

    public function packets(): HasMany
    {
        return $this->hasMany(Packet::class);
    }
}
