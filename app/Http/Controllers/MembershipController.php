<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        return view('membership');
    }

    public function join(Request $request)
    {
        // Check if user already has membership
        $existingMembership = Membership::where('user_id', Auth::id())->first();

        if ($existingMembership) {
            return redirect()->route('membership')->with('info', 'You are already a member!');
        }

        // Create new membership
        Membership::create([
            'user_id' => Auth::id(),
            'role' => 'Member',
            'status' => 'Active',
            'join_date' => now()
        ]);

        return redirect()->route('membership')->with('success', 'You have successfully joined our membership program!');
    }
}
