<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationReceipt;
use Razorpay\Api\Api;


class DonationController extends Controller
{

    public function index()
    {
        $donations = Donation::latest()->orderBy('id')->get();
        return view('admin.donation.index', compact('donations'));
    }
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


    public function updatePayment(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'donation_id' => 'required|exists:donations,id',
            'screenshot' => 'required|image|max:2048'
        ]);

        $donation = Donation::findOrFail($request->donation_id);

        // Store screenshot
        $imageFileName = null;
        if ($request->hasFile('screenshot')) {
            $image = $request->file('screenshot');
            $imageFileName = 'donation' . rand() . time() . '.' . $image->extension();
            $path = 'assets/donation';
            $image->storeAs($path, $imageFileName, ['disk' => 'public_uploads']);
        }
        $donation->screenshot_path = $imageFileName;
        $donation->save();

        return response()->json(['success' => true]);
    }

    public function updateStatus(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $donation = Donation::findOrFail($request->donation_id);
        $donation->status = $request->status;
        $donation->save();

        return redirect()->back()->with('success', 'Donation status updated successfully.');
    }

    public function sendEmail($id)
    {
        $donation = Donation::findOrFail($id);

        if ($donation->status !== 'approved') {
            return redirect()->back()->with('error', 'Only approved donations can receive email.');
        }

        try {
            Mail::to($donation->email)->send(new DonationReceipt($donation));
            $donation->email_send = 1;
            $donation->save();
            return redirect()->back()->with('success', 'Donation receipt email sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email');
        }
    }

        public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return redirect()->back()->with('success', 'Donation deleted successfully.');
    }



}
