<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // Retrieve all gallery images from the database
          $galleries = Gallery::all();
          // Get distinct categories for filters
          $categories = Gallery::distinct()->pluck('category');
          return view('gallery.index', compact('galleries', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AdminIndex(){
        $gallery = Gallery::all();
        return view('admin.gallery.index', compact('gallery'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        // dd($request->all());
        $request->validate([
            'photo_title' => 'required|string|max:255',
            'photo_category' => 'required',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:512',
        ]);


        $imageFileName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = 'pic' . rand() . time() . '.' . $image->extension();
            $path = 'assets/gallery';
            $image->storeAs($path, $imageFileName, ['disk' => 'public_uploads']);
        }

        // Create the blog entry
        Gallery::create([
            'title' => $request->input('photo_title'),
            'category' => $request->input('photo_category'),
            'description' => $request->input('description'),
            'image' => $imageFileName,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Photo added successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:galleries,id',
            'photo_title' => 'required|string|max:255',
            'photo_category' => 'required',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:512',
        ]);

        $gallery = Gallery::findOrFail($request->id);
        $gallery->title = $request->photo_title;
        $gallery->category = $request->photo_category;
        $gallery->description = $request->description;

        if ($request->hasFile('image')) {

            if ($gallery->image && file_exists(public_path('assets/gallery/' . $gallery->image))) {
                unlink(public_path('assets/gallery/' . $gallery->image));
            }
            $image = $request->file('image');
            $imageFileName = 'pic' . rand() . time() . '.' . $image->getClientOriginalExtension();
            $path = 'assets/gallery';
            $image->move(public_path($path), $imageFileName);
            $gallery->image = $imageFileName;
        }

        $gallery->save();

        return redirect()->back()->with('success', 'Photo updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=Gallery::findOrFail($id);
        if ($data->image) {
            $filePath = public_path('assets/gallery/' . $data->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            } else {
                \Log::error('File not found at path: ' . $filePath);
            }
        }
        $data->delete();
        return redirect()->back()->with('success', 'Photo deleted successfully');
    }
}
