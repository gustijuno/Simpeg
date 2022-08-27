<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function index()
    {
        $daftar_bidang = Bidang::all();
        return view('admin.bidang.tampil', compact(
            [
                'daftar_bidang'
            ]
        ));
    }

    public function add()
    {
        return view('admin.bidang.add');
    }

    public function simpan_bidang(Request $request)
    {
        $bidang = Bidang::create([
            'nama' => $request->nama,
            'nama_bidang' => $request->nama_bidang
        ]);
        return redirect()->route('admin/bidang');
    }

    public function store(Request $request)
    {
        //
        $bidang = new Bidang();
        $bidang->nama_bidang = $request->nama_bidang;
        $bidang->save();

        return redirect('admin/bidang');
    }

    public function edit($id)
    {
        $bidang = Bidang::find($id);
        return view('admin.bidang.edit', compact('bidang'));
    }



    public function simpan_edit(Request $request, $id)
    {
        $bidang = Bidang::find($id);
        $bidang->nama = $request->nama;
        $bidang->nama_bidang = $request->nama_bidang;
        $bidang->save();

        return redirect('admin/bidang')->with('update', 'Data Berhasil Di Update');
    }





    public function hapus($id)
    {
        $bidang = Bidang::find($id);
        $bidang->delete();

        return redirect()->route('admin/bidang');
    }
}
