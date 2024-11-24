<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        "hotel_name",
        "description",
        "address",
        "price_per_night",
        "destination_id"
    ];


    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function pakets(): HasMany
    {
        return $this->hasMany(Packet::class);
    }
}
