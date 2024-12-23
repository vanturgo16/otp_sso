<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;


class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $profil = User::where('id', Auth::user()->id)->first();
        return view('profil.index', compact('profil'));
    }

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
                'password' => ['required', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]+$/'],
                'current_password' => 'required|min:8',
            ],
            [
                'password.regex' => 'Password harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, dan satu karakter khusus.'
            ]
        );
        if (!Hash::check($request->input('current_password'), Auth::user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }

        $user = User::find(Auth::user()->id);
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
            $user->password_update = now();
            $user->save();
        }
        if ($user) {
            return redirect()->back()->with(['status' => 'Password Berhasil Di Update']);
        } else {
            return redirect()->back()->with(['error' => 'Password Gagal Di Update']);
        }
    }

    public function update_image(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'profile_photo_path' => 'image|mimes:png,jpg,jpeg|max:2000',
        ]);

        $user = User::find(Auth::user()->id);

        // Update name
        $user->name = $request->input('name');
        $user->save();

        // Update profile image if provided
        if ($request->hasFile('profile_photo_path')) {
            // Delete File Before
            if ($user->profile_photo_path && File::exists(public_path('staff/' . $user->profile_photo_path))) {
                File::delete(public_path('staff/' . $user->profile_photo_path));
            }
            // Define the storage path
            $folderPath = public_path('staff');
            // Create the folder if it doesn't exist
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0755, true);
            }

            // STORE FILE
            $profile_photo_path = $request->file('profile_photo_path');
            $fileName = $profile_photo_path->hashName();
            $profile_photo_path->move('staff', $fileName);
            // Update DB
            $user->profile_photo_path = $fileName;
            $user->save();
        }

        if ($user) {
            return redirect()->back()->with(['status' => 'Profil Berhasil Di Update']);
        } else {
            return redirect()->back()->with(['error' => 'Profil Gagal Di Update']);
        }
    }
}
