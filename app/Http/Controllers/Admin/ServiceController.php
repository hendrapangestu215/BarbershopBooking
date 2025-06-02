<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of services
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.manageService', compact('services'));
    }

    /**
     * Store a newly created service
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'featured' => 'nullable|array',
        ]);

        Service::create($validated);

        return redirect()->route('admin.manageService')->with('success', 'Service added successfully');
    }

    /**
     * Get the service for editing
     */
    public function edit(Service $service)
    {
        return response()->json($service);
    }

    /**
     * Update the specified service
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'featured' => 'nullable|array',
        ]);

        $service->update($validated);

        return redirect()->route('admin.manageService')->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified service
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.manageService')->with('success', 'Service deleted successfully');
    }
}
