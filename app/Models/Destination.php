<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function transports(): BelongsToMany
    {
        return $this->belongsToMany(Transport::class, 'destination_transport');
    }

    public function packets(): HasMany
    {
        return $this->hasMany(Packet::class);
    }
}
