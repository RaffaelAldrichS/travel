<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Packet extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama_paket",
        "deskripsi",
        "harga_total",
        "rating",
        "ulasan",
        "total_pembelian",
        "destination_id",
        "hotel_id",
        "transport_id"
    ];
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class);
    }
}
