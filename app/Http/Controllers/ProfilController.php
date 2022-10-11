<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::with('user')->where('id', Auth::user()->id)->first();
        return view('profil.index', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil::find(Auth::user()->id);
        $profil->update($request->all());
        User::find(Auth::user()->id)->update([
            'email' => $request->email,
            'name' => $request->name
        ]);
        return redirect()->route('dashboard')->with('success', 'Profil berhasil diperbarui');
    }

    public function changePassword()
    {
        return view('change-password');
    }

    public function updatePassword(Request $request)
    {
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Password lama salah!");
        }
        User::find(Auth::user()->id)->update(['password' => bcrypt($request->new_password)]);
        return redirect()->route('dashboard')->with('success', 'Password berhasil diperbarui');
    }
}
