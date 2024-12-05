<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $arts = Art::where('users_id', $user->id)->get();
        return view('profile.index', ['arts' => $arts], compact('user'));

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
}
