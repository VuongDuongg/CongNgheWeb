<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Guest;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rooms = Room::with('guest')->paginate(5);
        return view('rooms.index', compact('rooms'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $guests = Guest::all();
        return view('rooms.create', compact('guests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'room_number' => 'required|string|max:20|unique:rooms,room_number',
            'guest_id' => 'required|exists:guests,id',
            'room_type' => 'required|in:Single,Double,Suite',
            'price_per_night' => 'required|numeric|min:0.01',
            'check_in_date' => 'required|date',
            'check_out_date' => 'nullable|date|after_or_equal:check_in_date',
            'status' => 'required|in:Available,Occupied,Maintenance',
        ]);
        Room::create($validatedData);
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $room = Room::findOrFail($id);
        $guests = Guest::all();
        return view('rooms.edit', compact('room', 'guests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'room_number' => 'required|string|max:20|unique:rooms,room_number,' . $id,
            'price_per_night' => 'required|numeric|min:0.01',
            'check_out_date' => 'nullable|date|after_or_equal:check_in_date',
            'status' => 'required|in:Available,Occupied,Maintenance',
        ]);
        $room = Room::findOrFail($id);
        $room->update($validated);
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
