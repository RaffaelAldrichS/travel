<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('Pages.Hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('Pages.Hotels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_name' => 'required|max:191',
            'description' => 'required|max:255',
            'address' => 'required|max:50',
            'price_per_night' => 'required|numeric|max:12',
            'destination_id' => 'required|numeric',
        ]);

        Hotel::create([
            'hotel_name' => $request->hotel_name,
            'description' => $request->description,
            'address' => $request->address,
            'price_per_night' => $request->price_per_night,
            'destination_id' => $request->destination_id,
        ]);

        return redirect()->route('hotels.index')->with(['success' => 'Data saved successfully']);
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('Pages.Hotels.show', compact('hotel'));
    }
}
