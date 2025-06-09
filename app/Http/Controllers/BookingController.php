<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Booking;
use App\Models\Hairstyle;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // public function __construct()
    // {
    //     $this->userMiddleware('auth');
    // }

    public function index()
    {
        $services = Service::all();
        $barbers = Barber::all();

        return view('bookingAppointment', compact('services', 'barbers'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'barber_id' => 'nullable|exists:barbers,id',
        ]);

        // Store in session
        $request->session()->put('booking.service_id', $validated['service_id']);
        $request->session()->put('booking.barber_id', $validated['barber_id'] ?? null);

        return redirect()->route('booking.step-two');
    }

    public function stepTwo()
    {
        // Check if step one is completed
        if (!session('booking.service_id')) {
            return redirect()->route('booking.index');
        }

        $hairstyles = Hairstyle::all();

        return view('bookingAppointmentsteptwo', compact('hairstyles'));
    }

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'hairstyle_id' => 'required|exists:hairstyles,id',
        ]);

        // Store in session
        $request->session()->put('booking.hairstyle_id', $validated['hairstyle_id']);

        return redirect()->route('booking.step-three');
    }

    public function stepThree()
    {
        // Check if step two is completed
        if (!session('booking.hairstyle_id')) {
            return redirect()->route('booking.step-two');
        }

        return view('bookingAppointmentstepthree');
    }

    public function storeStepThree(Request $request)
    {
        $validated = $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
            'special_requests' => 'nullable|string|max:500',
        ]);

        // Store in session
        $request->session()->put('booking.booking_date', $validated['booking_date']);
        $request->session()->put('booking.booking_time', $validated['booking_time']);
        $request->session()->put('booking.special_requests', $validated['special_requests'] ?? null);

        return redirect()->route('booking.step-four');
    }

    public function stepFour()
    {
        // Check if step three is completed
        if (!session('booking.booking_date') || !session('booking.booking_time')) {
            return redirect()->route('booking.step-three');
        }

        $service = Service::findOrFail(session('booking.service_id'));
        $hairstyle = Hairstyle::findOrFail(session('booking.hairstyle_id'));
        $barber = session('booking.barber_id') ? Barber::findOrFail(session('booking.barber_id')) : null;

        $booking = new Booking();
        $booking->booking_date = session('booking.booking_date');
        $booking->booking_time = session('booking.booking_time');

        // Get the latest booking ID and add 1 for the preview
        $lastBookingId = Booking::max('id') ?? 0;
        $booking->booking_id = $lastBookingId + 1;

        return view('bookingAppointmentstepfour', compact('service', 'hairstyle', 'barber', 'booking'));
    }

    public function confirm(Request $request)
    {
        // Get the booking data from session
        $bookingData = session('booking');

        if (!$bookingData) {
            return redirect()->route('booking.index')->with('error', 'No booking information found. Please start again.');
        }

        // Convert the time from AM/PM format to 24-hour format
        $timeFormatted = date('H:i:s', strtotime($bookingData['booking_time']));

        // Create the booking record
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $bookingData['service_id'],
            'hairstyle_id' => $bookingData['hairstyle_id'],
            'date' => $bookingData['booking_date'],
            'time' => $timeFormatted,
            'barber_id' => $bookingData['barber_id'] ?? null,
            'special_requests' => $bookingData['special_requests'] ?? null,
            'status' => 'confirmed'
        ]);

        // Clear the booking session data
        session()->forget('booking');

        // Redirect to the booking details page
        return redirect()->route('booking.success', $booking->id)->with('success', 'Booking confirmed successfully!');
    }

    public function success($id)
    {
        // Find the booking with relationships
        $booking = Booking::with(['user', 'service', 'hairstyle', 'barber'])
            ->findOrFail($id);

        // Make sure the user can only see their own bookings
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('booking-success', compact('booking'));
    }
}
