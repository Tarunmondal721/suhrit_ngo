<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationReceipt;

class DonationController extends Controller
{
    // Store Donor Details
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
                'amount' => 'required|numeric|min:1'
            ]);

            // Store donation in the database (example)
            $donation = Donation::create($validated);

            return response()->json([
                'success' => true,
                'donation_id' => $donation->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // Update Payment Status
    public function updatePayment(Request $request)
    {
        // Validate request data
        $request->validate([
            'donation_id' => 'required|exists:donations,id',
            'transaction_id' => 'required|string|max:255|unique:donations,upi_transaction_id'
        ]);

        // Find donation
        $donation = Donation::find($request->donation_id);

        if (!$donation) {
            return response()->json(['success' => false, 'message' => 'Donation not found.'], 404);
        }

        // Update donation record
        $donation->update([
            'upi_transaction_id' => $request->transaction_id,
            'status' => 'completed'
        ]);

        // Send email receipt
        try {
            Mail::to($donation->email)->send(new DonationReceipt($donation));
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Payment recorded, but email could not be sent.']);
        }

        return response()->json(['success' => true, 'message' => 'Payment recorded successfully.']);
        return redirect()->back()->with('success', 'Payment recorded successfully.!');
    }

}

