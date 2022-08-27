<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
use App\Models\Jabatan;
use App\Models\Kontrak;
use App\Models\NIP;
use App\Models\Pegawai;
use App\Models\TipePegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use App\Models\Division;
use App\Models\UnitKerja;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
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
        $k = Pegawai::with('tipepegawai', 'kontrak', 'jabatan')
            ->orderBy('status_karyawan')
            ->get();
        $tp = TipePegawai::all();
        return view('pages.DataKaryawan.index', compact('k', 'tp'));
    }
    public function getDataKaryawan()
    {
        $data = Pegawai::with('tipepegawai', 'kontrak')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $n = NIP::all();
        $tp = TipePegawai::all();
        return view('pages.DataKaryawan.create', compact('n', 'tp'));
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
            'nip' => 'required',
            'nama_lengkap' => 'required',
            'id_kepegawaian' => 'required'
        ]);
        $tipepegawai = 61;
        if ($request->id_kepegawaian == '61') {
            $tipepegawai = 1;
        } else if ($request->id_kepegawaian == '64') {
            $tipepegawai = 2;
        } else if ($request->id_kepegawaian == '91') {
            $tipepegawai = 3;
        } else if ($request->id_kepegawaian == '94') {
            $tipepegawai = 4;
        }

        Pegawai::create([
            'nip' => $request->nip,
            'nama' => $request->nama_lengkap,
            'kode_tipe_pegawai' => $tipepegawai,
            'kode_jabatan' => '1'
        ]);
        $pegawai = Pegawai::where('nip', $request->nip)->first();
        $kontrak = new Kontrak;
        $kontrak->id_pegawai = $pegawai->id;
        if ($kontrak->save()) {
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }
        return redirect()
            ->route('Karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $k = Pegawai::with('tipepegawai', 'kontrak', 'jabatan')->where('id', $id)->get();
        return view('pages.DataKaryawan.detail', compact('k'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Pegawai::with('kontrak')->where('id', $id)->get();
        $tp = TipePegawai::all();
        $j = Jabatan::all();
        $d = Division::all();
        return view('pages.DataKaryawan.edit', compact('p', 'tp', 'j', 'd'));
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
            'nip' => 'required',
            'nama' => 'required',
            'status_karyawan' => 'required',
            'masa_kerja' => 'required',
            'asal_kepegawaian' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan_terakhir' => 'required',
            'pendidikan_tnt' => 'required',
            'jurusan_pendidikan' => 'required',
            'sekolah_universitas' => 'required',
            'pendidikan_diakui' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required',
            'agama' => 'required',
            'status_hubungan_dalam_keluarga' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat_ktp' => 'required',
            'alamat_domisili' => 'required',
            'kota_asal' => 'required',
            'no_ktp' => 'required',
            'kewarganegaraan' => 'required',
            'no_kitap' => 'required',
            'no_bpjs_kesehatan' => 'required',
            'no_bpjs_ketenagakerjaan' => 'required',
            'nama_bank' => 'required',
            'no_rekening_gaji' => 'required',
            'no_rekening_ppip' => 'required',
            'npwp' => 'required',
            'no_handphone' => 'required',
            'no_passport' => 'required',
            'email' => 'required|email',
            'unit_kerja' => 'required',
            'departemen' => 'required',
            'division' => 'required',
            'kode_jabatan'  => 'required',
            'kode_tipe_pegawai' => 'required',
        ]);
        $pegawai = Pegawai::where('id', $id)->first();
        if ($request->has('foto_pegawai') && $pegawai->foto_pegawai == null) {
            $request->validate('foto_pegawai');
        }
        //Data Kontrak

        $kontrak = Kontrak::where('id_pegawai', $pegawai->id)->first();
        $i = 1;
        while ($i <= 7) {
            if ($request['kontrak_' . $i] != null) {

                $kontrak['kontrak_' . $i] = Carbon::createFromFormat('d-m-Y', $request['kontrak_' . $i]);

                if ($request['selesai_kontrak_' . $i] != null) {
                    $kontrak['selesai_kontrak_' . $i] = Carbon::createFromFormat('d-m-Y', $request['selesai_kontrak_' . $i]);
                } else {
                    $kontrak['selesai_kontrak_' . $i] = $request['selesai_kontrak_' . $i];
                }
            } else {
                $kontrak['kontrak_' . $i] = $request['kontrak_' . $i];
            }
            $kontrak->save();
            $i++;
        }

        // Data Pegawai (Pribadi dan Kelengkapan)
        $pegawai->nip = $request->nip;
        $pegawai->nama = ucwords($request->nama);
        $pegawai->status_karyawan = $request->status_karyawan;
        $pegawai->masa_kerja = ucwords($request->masa_kerja);
        $pegawai->asal_kepegawaian = $request->asal_kepegawaian;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->pendidikan_terakhir = $request->pendidikan_terakhir;
        $pegawai->pendidikan_tnt = $request->pendidikan_tnt;
        $pegawai->jurusan_pendidikan = ucfirst($request->jurusan_pendidikan);
        $pegawai->sekolah_universitas = ucwords($request->sekolah_universitas);
        $pegawai->pendidikan_diakui = ucfirst($request->pendidikan_diakui);
        $pegawai->tempat_lahir = ucwords($request->tempat_lahir);
        if ($request->tanggal_lahir != null) {
            $pegawai->tanggal_lahir = Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir);
        } else {
            $pegawai->tanggal_lahir = $request->tanggal_lahir;
        }
        $pegawai->umur = $request->umur;
        $pegawai->agama = ucfirst($request->agama);
        $pegawai->status_hubungan_dalam_keluarga = ucfirst($request->status_hubungan_dalam_keluarga);
        $pegawai->nama_ayah = ucwords($request->nama_ayah);
        $pegawai->nama_ibu = ucwords($request->nama_ibu);
        $pegawai->alamat_ktp = ucwords($request->alamat_ktp);
        $pegawai->alamat_domisili = ucwords($request->alamat_domisili);
        $pegawai->kota_asal = ucwords($request->kota_asal);
        $pegawai->no_ktp = $request->no_ktp;
        $pegawai->kewarganegaraan = ucwords($request->kewarganegaraan);
        $pegawai->no_kitap = $request->no_kitap;
        $pegawai->no_bpjs_kesehatan = $request->no_bpjs_kesehatan;
        $pegawai->no_passport = $request->no_passport;
        $pegawai->no_bpjs_ketenagakerjaan = $request->no_bpjs_ketenagakerjaan;
        $pegawai->nama_bank = ucwords($request->nama_bank);
        $pegawai->no_rekening_gaji = $request->no_rekening_gaji;
        $pegawai->no_rekening_ppip = $request->no_rekening_ppip;
        $pegawai->npwp = $request->npwp;
        $pegawai->no_handphone = $request->no_handphone;
        $pegawai->email = $request->email;
        $pegawai->unit_kerja = $request->unit_kerja;
        $pegawai->departemen = $request->departemen;
        $pegawai->division = $request->division;
        $pegawai->kode_jabatan = $request->kode_jabatan;
        $pegawai->kode_tipe_pegawai = $request->kode_tipe_pegawai;

        $identitas = $pegawai->nip . '-' . $pegawai->nama;
        if ($request->has('foto_pegawai')) {
            $file = $request->file('foto_pegawai');
            $name = 'Pegawai_Reka_' . $identitas . '.' . $file->extension();

            Artisan::call('storage:link');
            if (Storage::exists($pegawai->foto_pegawai)) {
                Storage::delete('public/' . $identitas . '/foto/Karyawan/' . $name);
            }

            $url = Storage::putFileAs('public/' . $identitas . '/foto/Karyawan', $file, $name);
            $pegawai->foto_pegawai = $url;
        }
        if ($pegawai->save()) {
            alert('Data Berhasil Terupdate!')->background('#B5EDCC');
        } else {
            alert('Update Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('Karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        Kontrak::where('id_pegawai', $id)->delete();
        $t = new DataTrainingController();
        $t->destroyall($id);
        $keluarga = DataKeluarga::where('id_pegawai', $id)->first();
        if (!empty($keluarga->id)) {
            $kc = new DataKeluargaController();
            $kc->destroy($keluarga->id);
        }
        $pegawai->delete();
        // return redirect()->route('Karyawan.index');
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

    public function export(Request $request)
    {
        $todayDate = Carbon::now()->format('d-m-Y-H-i-m');
        $nama = 'report-pegawai-' . $todayDate;
        $data = [];
        if ($request->kode_tipe_pegawai == '' && $request->asal_kepegawaian == '') {
            $data =  Pegawai::join('kontrak', 'kontrak.id_pegawai', 'pegawai.id')
                ->join('jabatan', 'jabatan.id', 'pegawai.kode_jabatan')
                ->join('tipe_pegawai', 'tipe_pegawai.id', 'pegawai.kode_tipe_pegawai')
                ->orderBy('nama', 'ASC')
                ->get([
                    'nip',
                    'nama',
                    'status_karyawan',
                    'kontrak.kontrak_1',
                    'kontrak.selesai_kontrak_1',
                    'kontrak.kontrak_2',
                    'kontrak.selesai_kontrak_2',
                    'kontrak.kontrak_3',
                    'kontrak.selesai_kontrak_3',
                    'kontrak.kontrak_4',
                    'kontrak.selesai_kontrak_4',
                    'kontrak.kontrak_5',
                    'kontrak.selesai_kontrak_5',
                    'kontrak.kontrak_6',
                    'kontrak.selesai_kontrak_6',
                    'kontrak.kontrak_7',
                    'kontrak.selesai_kontrak_7',
                    'masa_kerja',
                    'asal_kepegawaian',
                    'jenis_kelamin',
                    'pendidikan_terakhir',
                    'pendidikan_tnt',
                    'jurusan_pendidikan',
                    'sekolah_universitas',
                    'pendidikan_diakui',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'umur',
                    'agama',
                    'status_hubungan_dalam_keluarga',
                    'nama_ayah',
                    'nama_ibu',
                    'alamat_ktp',
                    'alamat_domisili',
                    'kota_asal',
                    'no_ktp',
                    'kewarganegaraan',
                    'no_kitap',
                    'no_bpjs_kesehatan',
                    'nama_bank',
                    'no_rekening_gaji',
                    'no_rekening_ppip',
                    'npwp',
                    'no_handphone',
                    'email',
                    'unit_kerja',
                    'departemen',
                    'division',
                    'foto_pegawai',
                    'jabatan.nama_jabatan',
                    'tipe_pegawai.nama_tipe_pegawai',
                ]);
        } elseif ($request->kode_tipe_pegawai != '' && $request->asal_kepegawaian == '') {
            $data =  Pegawai::join('kontrak', 'kontrak.id_pegawai', 'pegawai.id')
                ->join('jabatan', 'jabatan.id', 'pegawai.kode_jabatan')
                ->join('tipe_pegawai', 'tipe_pegawai.id', 'pegawai.kode_tipe_pegawai')
                ->orderBy('nama', 'ASC')
                ->where('pegawai.kode_tipe_pegawai', $request->kode_tipe_pegawai)
                ->get([
                    'nip',
                    'nama',
                    'status_karyawan',
                    'kontrak.kontrak_1',
                    'kontrak.selesai_kontrak_1',
                    'kontrak.kontrak_2',
                    'kontrak.selesai_kontrak_2',
                    'kontrak.kontrak_3',
                    'kontrak.selesai_kontrak_3',
                    'kontrak.kontrak_4',
                    'kontrak.selesai_kontrak_4',
                    'kontrak.kontrak_5',
                    'kontrak.selesai_kontrak_5',
                    'kontrak.kontrak_6',
                    'kontrak.selesai_kontrak_6',
                    'kontrak.kontrak_7',
                    'kontrak.selesai_kontrak_7',
                    'masa_kerja',
                    'asal_kepegawaian',
                    'jenis_kelamin',
                    'pendidikan_terakhir',
                    'pendidikan_tnt',
                    'jurusan_pendidikan',
                    'sekolah_universitas',
                    'pendidikan_diakui',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'umur',
                    'agama',
                    'status_hubungan_dalam_keluarga',
                    'nama_ayah',
                    'nama_ibu',
                    'alamat_ktp',
                    'alamat_domisili',
                    'kota_asal',
                    'no_ktp',
                    'kewarganegaraan',
                    'no_kitap',
                    'no_bpjs_kesehatan',
                    'nama_bank',
                    'no_rekening_gaji',
                    'no_rekening_ppip',
                    'npwp',
                    'no_handphone',
                    'email',
                    'unit_kerja',
                    'departemen',
                    'division',
                    'foto_pegawai',
                    'jabatan.nama_jabatan',
                    'tipe_pegawai.nama_tipe_pegawai',
                ]);
        } elseif ($request->kode_tipe_pegawai == '' && $request->asal_kepegawaian != '') {
            $data =  Pegawai::join('kontrak', 'kontrak.id_pegawai', 'pegawai.id')
                ->join('jabatan', 'jabatan.id', 'pegawai.kode_jabatan')
                ->join('tipe_pegawai', 'tipe_pegawai.id', 'pegawai.kode_tipe_pegawai')
                ->orderBy('nama', 'ASC')
                ->where('pegawai.asal_kepegawaian', $request->asal_kepegawaian)
                ->get([
                    'nip',
                    'nama',
                    'status_karyawan',
                    'kontrak.kontrak_1',
                    'kontrak.selesai_kontrak_1',
                    'kontrak.kontrak_2',
                    'kontrak.selesai_kontrak_2',
                    'kontrak.kontrak_3',
                    'kontrak.selesai_kontrak_3',
                    'kontrak.kontrak_4',
                    'kontrak.selesai_kontrak_4',
                    'kontrak.kontrak_5',
                    'kontrak.selesai_kontrak_5',
                    'kontrak.kontrak_6',
                    'kontrak.selesai_kontrak_6',
                    'kontrak.kontrak_7',
                    'kontrak.selesai_kontrak_7',
                    'masa_kerja',
                    'asal_kepegawaian',
                    'jenis_kelamin',
                    'pendidikan_terakhir',
                    'pendidikan_tnt',
                    'jurusan_pendidikan',
                    'sekolah_universitas',
                    'pendidikan_diakui',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'umur',
                    'agama',
                    'status_hubungan_dalam_keluarga',
                    'nama_ayah',
                    'nama_ibu',
                    'alamat_ktp',
                    'alamat_domisili',
                    'kota_asal',
                    'no_ktp',
                    'kewarganegaraan',
                    'no_kitap',
                    'no_bpjs_kesehatan',
                    'nama_bank',
                    'no_rekening_gaji',
                    'no_rekening_ppip',
                    'npwp',
                    'no_handphone',
                    'email',
                    'unit_kerja',
                    'departemen',
                    'division',
                    'foto_pegawai',
                    'jabatan.nama_jabatan',
                    'tipe_pegawai.nama_tipe_pegawai',
                ]);
        } elseif ($request->kode_tipe_pegawai != '' && $request->kode_tipe_pegawai != '') {
            $data =  Pegawai::join('kontrak', 'kontrak.id_pegawai', 'pegawai.id')
                ->join('jabatan', 'jabatan.id', 'pegawai.kode_jabatan')
                ->join('tipe_pegawai', 'tipe_pegawai.id', 'pegawai.kode_tipe_pegawai')
                ->orderBy('nama', 'ASC')
                ->where([
                    ['pegawai.kode_tipe_pegawai', $request->kode_tipe_pegawai],
                    ['pegawai.asal_kepegawaian', $request->asal_kepegawaian]
                ])
                ->get([
                    'nip',
                    'nama',
                    'status_karyawan',
                    'kontrak.kontrak_1',
                    'kontrak.selesai_kontrak_1',
                    'kontrak.kontrak_2',
                    'kontrak.selesai_kontrak_2',
                    'kontrak.kontrak_3',
                    'kontrak.selesai_kontrak_3',
                    'kontrak.kontrak_4',
                    'kontrak.selesai_kontrak_4',
                    'kontrak.kontrak_5',
                    'kontrak.selesai_kontrak_5',
                    'kontrak.kontrak_6',
                    'kontrak.selesai_kontrak_6',
                    'kontrak.kontrak_7',
                    'kontrak.selesai_kontrak_7',
                    'masa_kerja',
                    'asal_kepegawaian',
                    'jenis_kelamin',
                    'pendidikan_terakhir',
                    'pendidikan_tnt',
                    'jurusan_pendidikan',
                    'sekolah_universitas',
                    'pendidikan_diakui',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'umur',
                    'agama',
                    'status_hubungan_dalam_keluarga',
                    'nama_ayah',
                    'nama_ibu',
                    'alamat_ktp',
                    'alamat_domisili',
                    'kota_asal',
                    'no_ktp',
                    'kewarganegaraan',
                    'no_kitap',
                    'no_bpjs_kesehatan',
                    'nama_bank',
                    'no_rekening_gaji',
                    'no_rekening_ppip',
                    'npwp',
                    'no_handphone',
                    'email',
                    'unit_kerja',
                    'departemen',
                    'division',
                    'foto_pegawai',
                    'jabatan.nama_jabatan',
                    'tipe_pegawai.nama_tipe_pegawai',
                ]);
        }
        if (!empty($data[0]['nip'])) {
            return Excel::download(new PegawaiExport($data), $nama . '.xlsx');
        } else {
            alert('Data Tidak Ditemukan!')->background('#F4CACA');
            return redirect()->back();
        }
    }
    public function import(Request $request)
    {
        if ($request->has('file')) {
            $import = Excel::import(new PegawaiImport, $request->file('file'));
            if ($import) {
                alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
            } else {
                alert('Simpan Data Gagal!')->background('#F4CACA');
            }
        }
        return redirect()->route('Karyawan.index');
    }
    public function getUnitKerja($nama)
    {
        $divisi = Division::where('nama_divisi', $nama)->first();
        $uk = UnitKerja::where('division_id', $divisi->id)->pluck('nama_unit_kerja', 'id');
        return response()->json($uk);
    }
    public function getProvince($value)
    {
    $cek = strtoupper($value);
    dd($cek);
    }
}
