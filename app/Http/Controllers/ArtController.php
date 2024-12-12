<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtController extends Controller
{
    /**
     * Display the user's uploaded art in the profile section.
     */
    public function index()
    {
//        $arts = Art::where('users_id', Auth::id())->get();
        $arts = Art::select('art_id', 'name', 'art_picture')->get();


        return view('art.index', compact('arts'));
    }

    public function view()
    {
        $arts = Art::all();

        return view('gallery', compact('arts'));
    }

    /**
     * Store a newly created art upload in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'art_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'art_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Handle file upload
        if ($request->hasFile('art_picture')) {
            $file = $request->file('art_picture');
            $filePath = $file->store('uploads/art', 'public');
        } else {
            return back()->withErrors('File upload failed. Please try again.');
        }


        $art = new Art();
        $art->art_picture = $filePath;
        $art->name = $request->input('art_name');
        $art->description = $request->input('description');
        $art->users_id = Auth::id();
        $art->save();

        return redirect()->route('art.index')->with('success', 'Art uploaded successfully!');
    }

    /**
     * Delete an uploaded art record.
     */
    public function destroy(Art $art)
    {
        // Check ownership
        if ($art->users_id !== Auth::id()) {
            return redirect()->route('art.index')->withErrors('You are not authorized to delete this art.');
        }

        // Delete the file
        if ($art->art_picture) {
            Storage::disk('public')->delete($art->art_picture);
        }

        // Delete the record
        $art->delete();

        return redirect()->route('art.index')->with('success', 'Art deleted successfully!');
    }


    public function show($art_id)
    {
        $art = Art::with('users')->find($art_id);

        if (!$art) {
            return redirect()->route('gallery')->with('error', 'Art not found');
        }
        return view('art.detail', compact('art'));
    }
}
