<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventRegistrationMail;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Support\Carbon;
class EventController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::orderBy('date', 'asc')->where('status','ongoing')->get(); // Order events by date
        $completedEvents = Event::orderBy('date', 'asc')->where('status','completed')->get(); // Order events by date
        return view('event.index', compact('upcomingEvents','completedEvents'));
    }

    // Display a specific event
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function AdminIndex()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }
    public function register(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
           'phone' => 'required|digits:10|numeric',
        ]);




        $verificationToken = bin2hex(random_bytes(32));

        // Save user without marking email as verified
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => 'user',
            'password' => bcrypt('password'), // Set a temporary password
            'email_verified_at' => Carbon::now(),
            'address' => $request->address// Email is not verified yet
        ]);

        // Save the verification token
        // $dd=EmailVerification::create([
        //     'email' => $user->email,
        //     'token' => $verificationToken,
        // ]);

        // Send verification email
        // $this->sendVerificationEmail($user->email, $verificationToken);

        $event = Event::findOrFail($id);

        Mail::to($request->email)->send(new EventRegistrationMail($event, $request->name));

        return redirect()->route('events')->with('success', 'You have successfully registered for the event!');
    }


    /**
     * Fetch all events for displaying in the table.
     */
    public function fetchEvents()
    {
        $events = Event::orderBy('date', 'asc')->get();
        return response()->json($events);
    }

    /**
     * Store a newly created event in storage via AJAX.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:512',
        ]);

        $imageFileName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = 'enent' . rand() . time() . '.' . $image->extension();
            $path = 'assets/event';
            $image->storeAs($path, $imageFileName, ['disk' => 'public_uploads']);

        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'image' => $imageFileName,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Event Create successfully!');
    }
}

    /**
     * Update the specified event in storage via AJAX.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:512',
        ]);

        $imageFileName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = 'enent' . rand() . time() . '.' . $image->extension();
            $path = 'assets/event';
            $image->storeAs($path, $imageFileName, ['disk' => 'public_uploads']);
            $event->image = $imageFileName;
        }
        $event->update($request->only('title', 'description', 'date', 'time', 'location', 'image'));
        return redirect()->back()->with('success', 'Event Update successfully!');
    }

    /**
     * Remove the specified event from storage via AJAX.
     */
    public function destroy( $event)
    {
        $data=Event::findOrFail($event);
        if ($data->image) {
            $filePath = public_path('assets/event/' . $data->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            } else {
                \Log::error('File not found at path: ' . $filePath);
            }
        }
        $data->delete();
        return redirect()->back()->with('success', 'Event deleted successfully');

    }

    protected function sendVerificationEmail($email, $token)
{
    $verificationLink = route('verify.email', $token); // URL to the verification route

    Mail::send('emails.verify', ['verificationLink' => $verificationLink], function ($message) use ($email) {
        $message->to($email);
        $message->subject('Verify Your Email Address');
    });
}


    public function verifyEmail($token)
    {
        $verification = EmailVerification::where('token', $token)->first();

        if (!$verification) {
            return redirect()->back()->with('error', 'Invalid verification link.');
        }

        $user = User::where('email', $verification->email)->first();
        if ($user) {
            $user->email_verified_at = Carbon::now();
            $user->save();

            $verification->delete();

            return redirect()->back()->with('success', 'Your email has been verified successfully!');
        }

        return redirect()->back()->with('error', 'User not found.');
    }


}
