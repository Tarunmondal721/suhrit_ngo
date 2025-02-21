<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AdminIndex(){
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_date' => 'required|date',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:512',
        ]);

        // Handle the image upload
        $imageFileName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = 'blog' . rand() . time() . '.' . $image->extension();
            $path = 'assets/blog';
            $image->storeAs($path, $imageFileName, ['disk' => 'public_uploads']);
        }

        // Create the blog entry
        Blog::create([
            'title' => $request->input('blog_title'),
            'date' => $request->input('blog_date'),
            'description' => $request->input('description'),
            'image' => $imageFileName,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Blog added successfully.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:blogs,id',
            'blog_title' => 'required|string|max:255',
            'blog_date' => 'required|date',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:512',
        ]);

        $blog = Blog::findOrFail($request->id);
        $blog->title = $request->blog_title;
        $blog->date = $request->blog_date;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = 'blog' . rand() . time() . '.' . $image->getClientOriginalExtension();
            $path = 'assets/blog';
            $image->move(public_path($path), $imageFileName);
            $blog->image = $imageFileName;
        }

        $blog->save();

        return redirect()->back()->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=Blog::findOrFail($id);
        if ($data->image) {
            $filePath = public_path('assets/blog/' . $data->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            } else {
                \Log::error('File not found at path: ' . $filePath);
            }
        }
        $data->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully');
    }
}
