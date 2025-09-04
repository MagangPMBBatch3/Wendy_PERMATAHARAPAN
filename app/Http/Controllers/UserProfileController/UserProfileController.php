<?php

namespace App\Http\Controllers\UserProfileController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('userprofile.index', ['pageTitle' => 'User Profile']);
    }

    public function profile()
    {
        return view('userprofile.profile', ['pageTitle' => 'Edit Profile']);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nrp' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'bagian_id' => 'required|exists:bagians,id',
            'level_id' => 'required|exists:levels,id',
            'status_id' => 'required|exists:statuses,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = \Illuminate\Support\Facades\Auth::user();
        $userProfile = \App\Models\UserProfile\UserProfile::where('user_id', $user->id)->first();

        if (!$userProfile) {
            $userProfile = new \App\Models\UserProfile\UserProfile();
            $userProfile->user_id = $user->id;
        }

        $userProfile->nama_lengkap = $request->nama_lengkap;
        $userProfile->nrp = $request->nrp;
        $userProfile->alamat = $request->alamat;
        $userProfile->bagian_id = $request->bagian_id;
        $userProfile->level_id = $request->level_id;
        $userProfile->status_id = $request->status_id;

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($userProfile->foto && file_exists(public_path('storage/profiles/' . $userProfile->foto))) {
                unlink(public_path('storage/profiles/' . $userProfile->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/profiles'), $filename);
            $userProfile->foto = $filename;
        }

        $userProfile->save();

        return response()->json(['success' => true, 'message' => 'Profile updated successfully']);
    }
}
