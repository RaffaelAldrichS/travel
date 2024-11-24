<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    //
    public function index()
    {
        $destinations = Destination::latest()->paginate(5)->withQueryString();
        return view('Pages.Destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('Pages.Destinations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination_name' => 'required|max:191',
            'description' => 'required|max:255',
            'location' => 'required|max:50',
            'entrance_fee' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('images/destinations', $imageName, 'public');

        Destination::create([
            'destination_name' => $request->destination_name,
            'description' => $request->description,
            'location' => $request->location,
            'entrance_fee' => $request->entrance_fee,
            'image' => $imageName,
        ]);

        return redirect()->route('destinations.index')->with(['success' => 'Data saved successfully']);
    }

    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('Pages.Destinations.show', compact('destination'));
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('Pages.Destinations.edit', compact('destination'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'destination_name' => 'required|max:191',
            'description' => 'required|max:255',
            'location' => 'required|max:50',
            'entrance_fee' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $destination = Destination::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('images/destinations/' . $destination->image);
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('images/destinations', $imageName, 'public');
            $destination->image = $imageName;
        }

        $destination->update([
            'destination_name' => $request->destination_name,
            'description' => $request->description,
            'location' => $request->location,
            'entrance_fee' => $request->entrance_fee,
            'image' => $destination->image,
        ]);

        return redirect()->route('destinations.index')->with(['success' => 'Data updated successfully']);
    }

    public function destroy($id): RedirectResponse
    {
        $destination = Destination::findOrFail($id);

        Storage::disk('public')->delete('images/destinations/' . $destination->image);
        $destination->delete();

        return redirect()->route('destinations.index')->with(['Success' => 'Data Berhasil Dihapus!']);
    }
}
