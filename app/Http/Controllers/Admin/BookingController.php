<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\Booking;
use App\Models\Hairstyle;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     */
    public function index(Request $request)
    {
        $bookings = Booking::with(['user', 'service', 'hairstyle', 'barber'])->latest()->paginate(10);
        $users = User::where('usertype', '!=', 'admin')->get();
        $services = Service::all();
        $hairstyles = Hairstyle::all();
        $barbers = Barber::all();

        return view('admin.manageBooking', compact('bookings', 'users', 'services', 'hairstyles', 'barbers'));
    }

    /**
     * Store a newly created booking.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'hairstyle_id' => 'nullable|exists:hairstyles,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'barber_id' => 'required|exists:barbers,id',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Booking::create($request->all());

        return redirect()->route('admin.manageBooking')->with('success', 'Booking created successfully.');
    }

    /**
     * Show the form for editing the specified booking data for editing.
     */
    public function edit(Booking $booking)
    {
        return response()->json($booking);
    }

    /**
     * Update the specified booking.
     */
    public function update(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'hairstyle_id' => 'nullable|exists:hairstyles,id',
            'date' => 'required|date',
            'time' => 'required',
            'barber_id' => 'required|exists:barbers,id',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $booking->update($request->all());

        return redirect()->route('admin.manageBooking')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified booking.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.manageBooking')->with('success', 'Booking deleted successfully.');
    }
}
