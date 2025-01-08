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
        $arts = Art::select('art_id', 'name', 'art_picture')->get();

        return view('art.index', compact('arts'));
    }

    public function view(Request $request)
    {
//        $arts = Art::all();

        $search = $request->input('search');

        $arts = Art::select('art_id', 'name', 'art_picture')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();

        return view('gallery', compact('arts', 'search'));
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
        $art->save();

        Auth::user()->arts()->attach($art->art_id, [
            'ownership_status' => 1,
            'like_status' => false,
        ]);

        return redirect()->route('art.index')->with('success', 'Art uploaded successfully!');
    }


    /**
     * Delete an uploaded art record.
     */
    public function destroy($art_id)
    {
        $art = Art::where('art_id', $art_id)->firstOrFail();

        if (!$art->users->contains('id', Auth::id())) {
            return redirect()->route('gallery')->with('error', 'You are not authorized to delete this art.');
        }

        $art->users()->detach();

        $art->delete();

        return redirect()->route('gallery')->with('success', 'Art deleted successfully.');
    }




    public function show($id)
    {
        $art = Art::with('usersArt')->findOrFail($id);

        $likeCount = $art->usersArt()->wherePivot('like_status', true)->count();

        $userLikes = $art->usersArt()->where('users_id', Auth::id())->wherePivot('like_status', true)->count();

        return view('art.detail', compact('art', 'likeCount', 'userLikes'));
    }


    public function update(Request $request, $art_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $art = Art::findOrFail($art_id);

        if ($art->users->first()->id !== Auth::id()) {
            return redirect()->route('gallery')->with('error', 'You are not authorized to edit this art.');
        }

        $art->name = $request->input('name');
        $art->description = $request->input('description');

        $art->save();

        return redirect()->route('art.index')->with('success', 'Art updated successfully!');
    }


    public function edit($art_id)
    {
        $art = Art::findOrFail($art_id);
        if ($art->users->first()->id !== Auth::id()) {
            return redirect()->route('gallery')->with('error', 'You are not authorized to edit this art.');
        }
        return view('art.edit', compact('art'));
    }

    public function like($art_id)
    {
        $art = Art::findOrFail($art_id);
        $user = Auth::user();

        $pivotEntry = $art->users()->where('users.id', $user->id)->first();

        if ($pivotEntry) {
            $currentStatus = $pivotEntry->pivot->like_status;
            $art->users()->updateExistingPivot($user->id, ['like_status' => !$currentStatus]);
        } else {
            $art->users()->attach($user->id, ['like_status' => true]);
        }

        return redirect()->route('art.show', $art_id)->with('success', 'Like status updated!');
    }


    public function getTopLikedArtworks()
    {
        $arts = Art::select('art.*')
            ->selectSub(function ($query) {
                $query->selectRaw('count(*)')
                    ->from('users_art')
                    ->whereColumn('art.art_id', '=', 'users_art.art_art_id')
                    ->where('users_art.like_status', true);
            }, 'like_count')
            ->orderByDesc('like_count')
            ->limit(3)
            ->get();

        if ($arts->isEmpty()) {
            $arts = Art::orderByDesc('created_at')
                ->limit(3)
                ->get();
        }

        return view('dashboard', compact('arts'));
    }


}
