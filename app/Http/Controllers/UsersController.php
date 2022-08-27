<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view("pages.DataAdmin.index", compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.DataAdmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
            'tipe_user' => 'required',
            'password' => 'required',
        ]);

        $user = new User;

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->tipe_user = $request->tipe_user;
        $user->password = Hash::make($request->password);
        if (!$request->has('foto')) {
            $user->save();
        } else {
            $file = $request->file('foto');
            $name = 'Admin_Reka_'  . $request->nama . '.' . $file->extension();

            Artisan::call('storage:link');
            if (Storage::exists('public/images/foto/Admin' . $name)) {
                Storage::delete('public/images/foto/Admin' . $name);
            }

            $url = Storage::putFileAs('public/images/foto/Admin', $file, $name);
            $user->foto = $url;
            $user->save();
        }
        return redirect(route('admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.DataAdmin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("pages.DataAdmin.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
            'tipe_user' => 'required',
        ]);
        $user = User::find($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->tipe_user = $request->tipe_user;

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

        return redirect()->route('admin.index')
            ->with('success', 'Post updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
    }
}
