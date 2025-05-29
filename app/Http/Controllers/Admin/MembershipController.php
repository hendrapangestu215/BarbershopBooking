<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberships = Membership::with('user')->paginate(10);

        // Get users who don't already have a membership
        $existingUserIds = Membership::pluck('user_id')->toArray();
        $users = User::where('usertype', '!=', 'admin')
            ->whereNotIn('id', $existingUserIds)
            ->get();

        return view('admin.manageMembership', compact('memberships', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('usertype', '!=', 'admin')->get();
        return view('admin.membership.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string',
            'status' => 'required|string',
            'join_date' => 'required|date',
        ]);

        // Check if the user already has a membership
        $existingMembership = Membership::where('user_id', $request->user_id)->first();

        if ($existingMembership) {
            return back()->with('error', 'This user already has a membership. Please edit their existing membership instead.');
        }

        // Create membership if no existing one is found
        Membership::create([
            'user_id' => $request->user_id,
            'role' => $request->role,
            'status' => $request->status,
            'join_date' => $request->join_date,
        ]);

        return redirect()->route('admin.membership.index')->with('status', 'Membership created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Get membership data for editing in the modal.
     */
    public function editData(Membership $membership)
    {
        return response()->json([
            'id' => $membership->id,
            'user_id' => $membership->user_id,
            'role' => $membership->role,
            'status' => $membership->status,
            'join_date' => $membership->join_date->format('Y-m-d'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membership $membership)
    {
        $users = User::where('usertype', '!=', 'admin')->get();
        return view('admin.membership.edit', compact('membership', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Membership $membership)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'join_date' => 'required|date',
        ]);

        $membership->update($validated);

        return redirect()->route('admin.manageMembership')
            ->with('status', 'Membership updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membership $membership)
    {
        $membership->delete();

        return redirect()->route('admin.manageMembership')
            ->with('status', 'Membership deleted successfully.');
    }
}
