<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Beasiswa;
use App\Models\UserArt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $arts = Art::whereHas('usersArt', function ($query) use ($user) {
            $query->where('users_id', $user->id)->where('like_status', 1);
        })->get();

        return view('profile.index', compact('arts', 'user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'about' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'nullable|required_with:password|current_password',
            'password' => 'nullable|min:8|confirmed',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $imagename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('profile_images', $imagename, 'public');
            $user->profile_image = $imagename;

            $user->profile_image = $imagename;
        }

        $user->name = $request->name;
        $user->about = $request->about;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();

        if ($user->profile_image && Storage::exists('profile_images/' . $user->profile_image)) {
            Storage::delete('profile_images/' . $user->profile_image);
        }

        $user->delete();

        return redirect('/')->with('success', 'Account deleted successfully.');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        if ($user->profile_image && Storage::exists('profile_images/' . $user->profile_image)) {
            Storage::delete('profile_images/' . $user->profile_image);
        }

        $imageName = time() . '.' . $request->profile_image->extension();
        $request->profile_image->storeAs('profile_images', $imageName, 'public');

        $user->profile_image = $imageName;
        $user->save();

        return redirect()->back()->with('success', 'Profile image updated successfully.');
    }

    public function likeArt(Request $request, $artId)
    {
        $userId = Auth::id();

        $userArt = UserArt::where('users_id', $userId)->where('art_id', $artId)->first();

        if ($userArt) {
            $userArt->like_status = !$userArt->like_status;
            $userArt->save();
        } else {
            UserArt::create([
                'users_id' => $userId,
                'art_id' => $artId,
                'like_status' => true,
            ]);
        }

        return back()->with('success', 'Your like has been updated.');
    }

}
