<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    public function index()
    {
        $packets = Packet::all();
        return view('Pages.Packets.index', compact('packets'));
    }
}
