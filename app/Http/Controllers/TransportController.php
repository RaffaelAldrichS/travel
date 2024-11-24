<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Destination;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::latest()->paginate(5)->withQueryString();
        return view('Pages.Transports.index', compact('transports'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('Pages.Transports.create', compact('destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transport_name' => 'required|max:191',
            'description' => 'required|max:255',
            'transport_type' => 'required|max:50',
            'cost' => 'required|numeric',
            'destinations' => 'required|array',
        ]);

        $transport = Transport::create([
            'transport_name' => $request->transport_name,
            'description' => $request->description,
            'transport_type' => $request->transport_type,
            'cost' => $request->cost,
        ]);

        $transport->destinations()->sync($request->destinations);

        return redirect()->route('transports.index')->with(['success' => 'Data saved successfully']);
    }

    public function show($id)
    {
        $transport = Transport::findOrFail($id);
        return view('Pages.Transports.show', compact('transport'));
    }

    public function edit($id)
    {
        $transport = Transport::findOrFail($id);
        return view('Pages.Transports.edit', compact('transport'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'transport_name' => 'required|max:191',
            'description' => 'required|max:255',
            'transport_type' => 'required|max:50',
            'cost' => 'required|numeric',
        ]);

        $transport = Transport::findOrFail($id);

        $transport->update([
            'transport_name' => $request->transport_name,
            'description' => $request->description,
            'transport_type' => $request->transport_type,
            'cost' => $request->cost,
        ]);

        return redirect()->route('transports.index')->with(['success' => 'Data updated successfully']);
    }

    public function destroy($id): RedirectResponse
    {
        $transport = Transport::findOrFail($id);
        $transport->delete();

        return redirect()->route('transports.index')->with(['success' => 'Data deleted successfully']);
    }
}
