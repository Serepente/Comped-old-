<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function finance()
    {
        $user = Auth::user();
        $finances = Finance::where('user_id', $user->id)->get();
        return view('event-management.finance', compact('user', 'finances'));
    }

    public function processPayment(Request $request)
    {
        try {
            \Log::info("Processing Payment:", $request->all());

            // Validate request
            $validated = $request->validate([
                'amount' => 'required|numeric|min:1',
                'finance_id' => 'required|exists:finance,id',
                'gcash_number' => 'required|string|size:11',
            ]);

            // Create payment entry
            $payment = Payment::create([
                'finance_id' => $validated['finance_id'],
                'user_id' => Auth::id(),
                'amount' => $validated['amount'],
                'gcash_number' => $validated['gcash_number'],
                'status' => 'Pending-Approval',
            ]);

            return response()->json([
                'message' => '✅ Payment recorded successfully and is pending approval.',
                'payment_id' => $payment->id
            ]);

        } catch (\Exception $e) {
            \Log::error("Payment Error: " . $e->getMessage());

            return response()->json([
                'error' => '❌ Payment failed.',
                'message' => $e->getMessage()
            ], 500);
        }
    }






    // public function updateStatus(Request $request, $id)
    // {
    //     $finance = Finance::findOrFail($id);

    //     if (!in_array($request->status, Finance::getStatusOptions())) {
    //         return redirect()->back()->with('error', 'Invalid status selected.');
    //     }

    //     $finance->update(['status' => $request->status]);

    //     return redirect()->route('event-management.finance')->with('success', 'Payment status updated successfully.');
    // }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'payment_name' => 'required|string|max:255',
    //         'amount' => 'required|numeric|min:0',
    //         'description' => 'nullable|string',
    //     ]);

    //     Finance::create([
    //         'payment_name' => $request->payment_name,
    //         'amount' => $request->amount,
    //         'description' => $request->description,
    //     ]);

    //     return redirect()->route('event-management.finance')->with('success', 'Payment recorded successfully.');
    // }

    // public function edit($id)
    // {
    //     $user = Auth::user();
    //     $finance = Finance::findOrFail($id);
    //     return view('event-management.edit-finance', compact('user', 'finance'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'payment_name' => 'required|string|max:255',
    //         'amount' => 'required|numeric|min:0',
    //         'description' => 'nullable|string',
    //     ]);

    //     $finance = Finance::findOrFail($id);
    //     $finance->update([
    //         'payment_name' => $request->payment_name,
    //         'amount' => $request->amount,
    //         'description' => $request->description,
    //     ]);

    //     return redirect()->route('event-management.finance')->with('success', 'Payment updated successfully.');
    // }

    // public function destroy($id)
    // {
    //     $finance = Finance::findOrFail($id);
    //     $finance->delete();
    //     return redirect()->route('event-management.finance')->with('success', 'Payment deleted successfully.');
    // }
}


