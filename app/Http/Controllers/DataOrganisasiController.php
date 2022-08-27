<?php

namespace App\Http\Controllers;

use App\Models\DataOrganisasi;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Exports\DataOrganisasiExport;
use App\Imports\DataOrganisasiImport;
use Maatwebsite\Excel\Facades\Excel;


class DataOrganisasiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Organisasi = DataOrganisasi::all();

        return view('pages.DataOrganisasi.index', compact('Organisasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.DataOrganisasi.create');
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
            'kode_organisasi' => 'required',
            'nama_organisasi' => 'required',
            'nama_pejabat' => 'required',
            'level_organisasi' => 'required',
            'status' => 'required',
            'jobdesk' => 'required',
        ]);
        $file = $request->file('jobdesk');
        $identitas = 'Organisasi/' . $request->kode_organisasi . '-' . $request->nama_organisasi;
        $name = 'Organisasi_' . $request->kode_organisasi . '_' . $request->nama_organisasi . '.' . $file->extension();

        Artisan::call('storage:link');
        if (Storage::exists($name)) {
            Storage::delete('public/images/' . $identitas . '/' . $name);
        }

        $url = Storage::putFileAs('public/images/' . $identitas . '/', $file, $name);
        $do = DataOrganisasi::create([
            'kode_organisasi' => $request->kode_organisasi,
            'nama_organisasi' => $request->nama_organisasi,
            'nama_pejabat' => $request->nama_pejabat,
            'level_organisasi' => $request->level_organisasi,
            'status' => $request->status,
            'status_pejabat' => $request->status_pejabat,
            'jobdesk' => $url,
        ]);
        if ($do) {
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('Organisasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Organisasi = DataOrganisasi::find($id);    
        // dd($Organisasi->id);
        return view('pages.DataOrganisasi.detail', compact('Organisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organisasi = DataOrganisasi::find($id);

        return view('pages.DataOrganisasi.edit', compact('organisasi'));
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
            'kode_organisasi' => 'required',
            'nama_organisasi' => 'required',
            'nama_pejabat' => 'required',
            'level_organisasi' => 'required',
            'status' => 'required',
            'status_pejabat' => 'required',
        ]);

        $data = DataOrganisasi::find($id);
        $data->kode_organisasi = $request->kode_organisasi;
        $data->nama_organisasi = $request->nama_organisasi;
        $data->nama_pejabat = $request->nama_pejabat;
        $data->level_organisasi = $request->level_organisasi;
        $data->status = $request->status;
        $data->status_pejabat = $request->status_pejabat;

        if ($request->has('jobdesk')) {
            $file = $request->file('jobdesk');
            $identitas = 'Organisasi/' . $request->kode_organisasi . '-' . $request->nama_organisasi;
            $name = 'Organisasi_' . $request->kode_organisasi . '_' . $request->nama_organisasi . '.' . $file->extension();

            Artisan::call('storage:link');
            if (Storage::exists($name)) {
                Storage::delete('public/images/' . $identitas . '/' . $name);
            }

            $url = Storage::putFileAs('public/images/' . $identitas . '/', $file, $name);
            $data->jobdesk = $url;
        }
        if ($data->save()) {
            alert('Data Berhasil Terupdate!')->background('#B5EDCC');
        } else {
            alert('Update Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('Organisasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataOrganisasi::find($id)->delete();
    }
    
    public function export()
    {
        $todayDate = Carbon::now()->format('d-m-Y-H-i-m');
        $nama = 'report-organisasi-' . $todayDate;
        return Excel::download(new DataOrganisasiExport, $nama . '.xlsx');
    }
    public function import(Request $request)
    {
        if ($request->has('file')) {
            $import = Excel::import(new DataOrganisasiImport, $request->file('file'));
            if ($import) {
                alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
            } else {
                alert('Simpan Data Gagal!')->background('#F4CACA');
            }
        }
        return redirect()->route('Organisasi.index');
    }
}
