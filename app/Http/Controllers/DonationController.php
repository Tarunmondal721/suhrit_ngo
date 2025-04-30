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
        $donations = Donation::latest()->get();
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


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'amount' => 'required|numeric|min:1',
    //     ]);

    //     // Save the donation
    //     $donation = Donation::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'amount' => $request->amount,
    //         'address' => $request->address,
    //         'status' => 'pending'
    //     ]);

    //     // Create Razorpay order
    //     $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

    //     $razorpayOrder = $api->order->create([
    //         'receipt' => 'donation_rcpt_' . $donation->id,
    //         'amount' => $donation->amount * 100, // in paise
    //         'currency' => 'INR',
    //         'payment_capture' => 1
    //     ]);
    //     return response()->json([
    //         'success' => true,
    //         'donation_id' => $donation->id,
    //         'razorpay_key' => env('RAZORPAY_KEY_ID'),
    //         'amount' => $donation->amount * 100,
    //         'order_id' => $razorpayOrder['id'], // important for payment
    //     ]);
    // }



    // Update Payment Status
    // public function updatePayment(Request $request)
    // {
    //     // Validate request data
    //     $request->validate([
    //         'donation_id' => 'required|exists:donations,id',
    //         'transaction_id' => 'required|string|max:255|unique:donations,upi_transaction_id'
    //     ]);

    //     // Find donation
    //     $donation = Donation::find($request->donation_id);

    //     if (!$donation) {
    //         return response()->json(['success' => false, 'message' => 'Donation not found.'], 404);
    //     }

    //     // Update donation record
    //     $donation->update([
    //         'upi_transaction_id' => $request->transaction_id,
    //         'status' => 'completed'
    //     ]);

    //     // Send email receipt
    //     try {
    //         Mail::to($donation->email)->send(new DonationReceipt($donation));
    //     } catch (\Exception $e) {
    //         return response()->json(['success' => false, 'message' => 'Payment recorded, but email could not be sent.']);
    //     }

    //     return response()->json(['success' => true, 'message' => 'Payment recorded successfully.']);
    //     return redirect()->back()->with('success', 'Payment recorded successfully.!');
    // }

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



    // public function verify(Request $request)
    // {
    //     $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

    //     try {
    //         $payment = $api->payment->fetch($request->payment_id);

    //         if ($payment->status == 'captured') {
    //             // Update donation record
    //             Donation::where('id', $request->donation_id)->update([
    //                 'upi_transaction_id' => $payment->id,
    //                 'status' => 'paid'
    //             ]);

    //             return response()->json(['success' => true]);
    //         }

    //         return response()->json(['success' => false]);
    //     } catch (\Exception $e) {
    //         return response()->json(['success' => false, 'error' => $e->getMessage()]);
    //     }
    // }
}
