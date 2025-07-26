<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hairstyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HairstyleController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
            'image' => 'required|image|max:2048',
        ]);

        $hairstyle = new Hairstyle();
        $hairstyle->name = $validated['name'];
        $hairstyle->description = $validated['description'];
        $hairstyle->rating = $validated['rating'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hairstyles', 'public');
            $hairstyle->image = $path;
        }

        $hairstyle->save();

        return redirect()->route('admin.manageHairstyle')->with('success', 'Hairstyle added successfully');
    }

    public function edit(Hairstyle $hairstyle)
    {
        // Return hairstyle data as JSON for the modal
        return response()->json($hairstyle);
    }

    public function update(Request $request, Hairstyle $hairstyle)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
            'image' => 'nullable|image|max:2048',
        ]);

        $hairstyle->name = $validated['name'];
        $hairstyle->description = $validated['description'];
        $hairstyle->rating = $validated['rating'];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($hairstyle->image && !filter_var($hairstyle->image, FILTER_VALIDATE_URL) && Storage::disk('public')->exists($hairstyle->image)) {
                Storage::disk('public')->delete($hairstyle->image);
            }

            // Store new image
            $path = $request->file('image')->store('hairstyles', 'public');
            $hairstyle->image = $path;
        }

        $hairstyle->save();

        return redirect()->route('admin.manageHairstyle')->with('success', 'Hairstyle updated successfully');
    }

    public function destroy(Hairstyle $hairstyle)
    {
        // Delete image if exists
        if ($hairstyle->image && Storage::disk('public')->exists($hairstyle->image)) {
            Storage::disk('public')->delete($hairstyle->image);
        }

        $hairstyle->delete();

        return redirect()->route('admin.manageHairstyle')->with('success', 'Hairstyle deleted successfully');
    }
}
