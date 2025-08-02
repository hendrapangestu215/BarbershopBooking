<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $filterType = $request->filter ?? 'all';
        $query = Booking::with(['user', 'service', 'hairstyle', 'barber'])
            ->where('status', 'confirmed'); // Only count confirmed bookings

        // Apply date filters
        switch ($filterType) {
            case 'today':
                $query->whereDate('date', Carbon::today()->toDateString());
                break;
            case 'week':
                $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
                $endOfWeek = Carbon::now()->endOfWeek()->toDateString();
                $query->whereBetween('date', [$startOfWeek, $endOfWeek]);
                break;
            case 'month':
                $query->whereMonth('date', Carbon::now()->month)
                    ->whereYear('date', Carbon::now()->year);
                break;
                // Default: all bookings are shown
        }

        // Get bookings
        $bookings = $query->latest()->get();

        // Calculate total price of all filtered bookings
        $totalPrice = $bookings->sum(function ($booking) {
            return $booking->service->price;
        });

        return view('admin.reports', compact('bookings', 'totalPrice', 'filterType'));
    }

    public function export(Request $request)
    {
        $filterType = $request->filter ?? 'all';
        $query = Booking::with(['user', 'service', 'hairstyle', 'barber'])
            ->where('status', 'confirmed');

        // Apply the same filter logic as in the index method
        switch ($filterType) {
            case 'today':
                $query->whereDate('date', Carbon::today()->toDateString());
                break;
            case 'week':
                $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
                $endOfWeek = Carbon::now()->endOfWeek()->toDateString();
                $query->whereBetween('date', [$startOfWeek, $endOfWeek]);
                break;
            case 'month':
                $query->whereMonth('date', Carbon::now()->month)
                    ->whereYear('date', Carbon::now()->year);
                break;
        }

        $bookings = $query->latest()->get();
        $totalPrice = $bookings->sum(function ($booking) {
            return $booking->service->price;
        });

        // Pass the current timestamp to the view with the correct timezone
        $generatedAt = Carbon::now('Asia/Jakarta');

        $pdf = PDF::loadView('admin.reports-pdf', compact('bookings', 'totalPrice', 'filterType', 'generatedAt'));

        return $pdf->download('bookings-report.pdf');
    }
}
