<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transport extends Model
{

    protected $fillable = [
        "nama_transport",
        "deskripsi",
        "tipe_transport",
        "biaya",
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
