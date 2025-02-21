<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'nullable|date',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:512'
        ]);

        $imageFileName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = 'pic' . rand() . time() . '.' . $image->extension();
            $path = 'assets/service';
            $image->storeAs($path, $imageFileName, ['disk' => 'public_uploads']);
        }

        Service::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $imageFileName
        ]);

        return redirect()->route('services.index')->with('success', 'Service added successfully!');
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'nullable|date',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:512'
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::delete('public/' . $service->image);
            }
            $service->image = $request->file('image')->store('services', 'public');
        }

        $service->title = $request->title;
        $service->date = $request->date;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $data=Service::findOrFail($service);

        // if ($service->image) {
        //     Storage::delete('public/' . $service->image);
        // }

        if ($data->image) {
            $filePath = public_path('assets/gallery/' . $data->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            } else {
                \Log::error('File not found at path: ' . $filePath);
            }
        }
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }

    public function Userindex(){
        $services = Service::all();
        return view('service.index', compact('services'));
    }
}
