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
    public function destroy($art_id)
    {
        $art = Art::where('art_id', $art_id)->firstOrFail();

        if ($art->users_id !== Auth::id()) {
            return redirect()->route('gallery')->with('error', 'You are not authorized to delete this art.');
        }

        $art->delete();

        return redirect()->route('gallery')->with('success', 'Art deleted successfully.');
    }


    public function show($art_id)
    {
        $art = Art::with('users')->find($art_id);

        if (!$art) {
            return redirect()->route('gallery')->with('error', 'Art not found');
        }
        return view('art.detail', compact('art'));
    }

    public function update(Request $request, $art_id)
    {
        $request->validate([
            'art_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'art_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $art = Art::findOrFail($art_id);

        if ($art->users_id !== Auth::id()) {
            return redirect()->route('gallery')->with('error', 'You are not authorized to edit this art.');
        }

        if ($request->hasFile('art_picture')) {
            $file = $request->file('art_picture');
            $filePath = $file->store('uploads/art', 'public');
            $art->art_picture = $filePath;
        }

        $art->name = $request->input('art_name');
        $art->description = $request->input('description');
        $art->save();

        return redirect()->route('art.index')->with('success', 'Art updated successfully!');
    }

    public function edit($art_id)
    {
        $art = Art::findOrFail($art_id);

        if ($art->users_id !== Auth::id()) {
            return redirect()->route('gallery')->with('error', 'You are not authorized to edit this art.');
        }

        return view('art.edit', compact('art'));
    }
}
