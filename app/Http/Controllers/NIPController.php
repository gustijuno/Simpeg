<?php

namespace App\Http\Controllers;

use App\Exports\NipExport;
use App\Models\NIP;
use App\Models\TipePegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class NIPController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $n = NIP::all();
        $tp = TipePegawai::all();
        $sk = NIP::select('tahun_sk')->distinct()->get();
        // return response()->json($sk);
        return view('pages.DataNip.index', compact('n', 'tp', 'sk'));
    }

    public function create()
    {
        $tp = TipePegawai::all();
        return view('pages.DataNip.create', compact('tp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kepegawaian' => 'required',
            'tahun_sk' => 'required',
            'no_urut_pegawai' => 'required',
            'nama_lengkap' => 'required',
        ]);
        NIP::create($request->all());
        return redirect(route('NIP.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $nip = NIP::find($id);

        return view('pages.DataNip.edit', compact('nip'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kepegawaian' => 'required',
            'tahun_sk' => 'required',
            'no_urut_pegawai' => 'required',
            'nama_lengkap' => 'required',
        ]);

        $nip = NIP::where('id', $id)->first();
        // $data = DB::table('nip')
        //     ->where('id', $id)
        //     ->get()
        //     ->mapWithKeys(function ($data) {
        //         return ['nip' => $data->id_kepegawaian . $data->tahun_sk . $data->no_urut_pegawai];
        //     });
        // mengubah nip
        $nip->id_kepegawaian = $request->id_kepegawaian;
        $nip->tahun_sk = $request->tahun_sk;
        $nip->no_urut_pegawai = $request->no_urut_pegawai;
        $nip->nama_lengkap = $request->nama_lengkap;
        $nip->save();

        // // mengubah nip ditabel pegawai jika ada
        // if (Pegawai::where('nip', $data['nip'])->exists()) {
        //     $pegawai = Pegawai::where('nip', $data['nip'])->first();
        //     $pegawai->nip = $data['nip'];
        //     $pegawai->save();
        // }
        return redirect(route('NIP.index'));
    }

    public function destroy($id)
    {
        NIP::find($id)->delete();
    }

    public function getSK(Request $request)
    {
        $sk = NIP::where('id_kepegawaian', $request->IDPegawai)->pluck('id_kepegawaian', 'tahun_sk');
        return response()->json($sk);
    }

    public function getNoUrut($id_kepegawaian, $tahun_sk)
    {
        $no = DB::table('nip')
            ->select('id_kepegawaian', 'tahun_sk', 'no_urut_pegawai')
            ->whereNotIn('nama_lengkap', function ($q) {
                $q->select('nama')->from('pegawai');
            })
            ->where('id_kepegawaian', $id_kepegawaian)
            ->where('tahun_sk', $tahun_sk)
            ->pluck('tahun_sk', 'no_urut_pegawai');
        return response()->json($no);
    }

    public function getDataNip($id_kepegawaian, $tahun_sk, $no_urut_pegawai)
    {
        $data = DB::table('nip')
            ->select('id_kepegawaian', 'tahun_sk', 'no_urut_pegawai', 'nama_lengkap')
            ->where('id_kepegawaian', $id_kepegawaian)
            ->where('tahun_sk', $tahun_sk)
            ->where('no_urut_pegawai', $no_urut_pegawai)
            ->get()
            ->mapWithKeys(function ($data) {
                return [$data->nama_lengkap => $data->id_kepegawaian . $data->tahun_sk . $data->no_urut_pegawai];
            });

        return response()->json($data);
    }

    public function cekNIP($id_kepegawaian, $tahun_sk, $no_urut_pegawai)
    {
        if (NIP::where('id_kepegawaian', $id_kepegawaian)
            ->where('tahun_sk', $tahun_sk)
            ->where('no_urut_pegawai', $no_urut_pegawai)->exists()
        ) {
            return response()->json(['danger' => 'NIP dengan nomor urut tersebut sudah ada']);
        } else {
            return response()->json(['success' => 'Nomor urut dapat digunakan']);
        }
    }

    public function export(Request $request)
    {
        $todayDate = Carbon::now()->format('d-m-Y-H-i-m');
        $nama = 'report-nip-' . $todayDate;
        $data = [];
        if ($request->id_kepegawaian == '' && $request->tahun_sk == '') {
            $data = NIP::get([
                'id_kepegawaian',
                'tahun_sk',
                'no_urut_pegawai',
                'nama_lengkap'
            ]);
        } else if ($request->id_kepegawaian != '' && $request->tahun_sk == '') {
            $data = NIP::where('id_kepegawaian', $request->id_kepegawaian)->get([
                'id_kepegawaian',
                'tahun_sk',
                'no_urut_pegawai',
                'nama_lengkap'
            ]);
        } else if ($request->id_kepegawaian == '' && $request->tahun_sk != '') {
            $data = NIP::where('tahun_sk', $request->tahun_sk)->get([
                'id_kepegawaian',
                'tahun_sk',
                'no_urut_pegawai',
                'nama_lengkap'
            ]);
        } else if ($request->id_kepegawaian != '' && $request->tahun_sk != '') {
            $data = NIP::where([
                ['id_kepegawaian', $request->id_kepegawaian],
                ['tahun_sk', $request->tahun_sk]
            ])->get([
                'id_kepegawaian',
                'tahun_sk',
                'no_urut_pegawai',
                'nama_lengkap'
            ]);
        }
        if (!empty($data[0]['id_kepegawaian'])) {
            return Excel::download(new NipExport($data), $nama . '.xlsx');
        } else {
            alert('Data Tidak Ditemukan!')->background('#F4CACA');
            return redirect()->back();
        }
    }
}
