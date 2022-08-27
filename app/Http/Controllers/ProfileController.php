<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Account;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function view()
    {
        $users = Auth::user();
        $user = User::where('id_user', $users->id_user)->first();
        return view('viewprofil', compact('users', 'user'));
    }
    public function edit()
    {
        $users = Auth::user();
        $user = User::where('id_user', $users->id_user)->first();
        return view('editprofil', compact('users', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if (!$request->has('foto')) {
            $user->save();
        } else {
            $file = $request->file('foto');
            $name = 'Admin_Reka_'  . $request->nama . '.' . $file->extension();

            Artisan::call('storage:link');
            if (Storage::exists($name)) {
                Storage::delete('public/images/foto/Admin' . $name);
            }

            $url = Storage::putFileAs('public/images/foto/Admin', $file, $name);
            $user->foto = $url;
            $user->save();
        }

        return redirect()->route('User.viewprofil')
            ->with('success', 'Post updated successfully');
    }
}
