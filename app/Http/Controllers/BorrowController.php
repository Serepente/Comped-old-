<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $borrows = Borrow::where('user_id', $user->id)->get();
        return view('event-management.borrow', compact('user', 'borrows'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'borrower_name' => 'required|string|max:255',
            'school_id' => 'required|string|max:255',
            'date_issued' => 'required|date',
            'return_date' => 'required|date|after_or_equal:date_issued',
            'borrowed_item' => 'required|max:255',
            'quantity' => 'required|integer|min:1',
        ]);


        Borrow::create([
            'user_id' => Auth::id(),
            'borrower_name' => $validated['borrower_name'],
            'school_id' => $validated['school_id'],
            'date_issued' => $validated['date_issued'],
            'return_date' => $validated['return_date'],
            'borrowed_item' => $validated['borrowed_item'],
            'quantity' => $validated['quantity'],
            'status' => 'Pending',
        ]);

        return redirect()->route('event-management.borrow')->with('success', 'Items borrowed successfully!');
    }

    public function updateStatus($id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->update(['status' => 'Returned']);

        return redirect()->route('event-management.borrow')->with('success', 'Item marked as returned.');
    }
}
