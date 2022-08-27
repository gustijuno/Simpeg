<?php

namespace App\Imports;

use App\Models\Kontrak;
use App\Models\Pegawai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class PegawaiImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function cekJabatan($nama)
    {
        if ($nama == 'Belum Ada') {
            return '1';
        } else if ($nama == 'Direktur') {
            return '2';
        } else if ($nama == 'Supervisor') {
            return '3';
        } else if ($nama == 'Manajer') {
            return '4';
        } else if ($nama == 'Staff') {
            return '5';
        }
    }
    public function cekTipePegawai($nama)
    {
        if ($nama == 'Organik REKA') {
            return '1';
        } else if ($nama == 'PKWT REKA') {
            return '2';
        } else if ($nama == 'Organik INKA') {
            return '3';
        } else if ($nama == 'PKWT INKA') {
            return '4';
        }
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as  $row) {

            $pegawai =  Pegawai::create([
                'nip' => $row['NIP'],
                'nama' => $row['Nama'],
                'status_karyawan' => $row['Status Karyawan'],
                'masa_kerja' => $row['Masa Kerja'],
                'asal_kepegawaian' => $row['Asal Kepegawaian'],
                'jenis_kelamin' => $row['Jenis Kelamin'],
                'pendidikan_terakhir' => $row['Pendidikan Terakhir'],
                'pendidikan_tnt' => $row['Pendidikan T/NT'],
                'jurusan_pendidikan' => $row['Jurusan Pendidikan'],
                'sekolah_universitas' => $row['Sekolah/Universitas'],
                'pendidikan_diakui' => $row['Pendidikan Diakui'],
                'tempat_lahir' => $row['Tempat Lahir'],
                'tanggal_lahir' => $row['Tanggal Lahir'],
                'umur' => $row['Umur'],
                'agama' => $row['Agama'],
                'status_hubungan_dalam_keluarga' => $row['Status Hubungan Dalam Keluarga'],
                'nama_ayah' => $row['Nama Ayah'],
                'nama_ibu' => $row['Nama Ibu'],
                'alamat_ktp' => $row['Alamat KTP'],
                'alamat_domisili' => $row['Alamat Domisili'],
                'kota_asal' => $row['Kota Asal'],
                'no_ktp' => $row['No KTP'],
                'kewarganegaraan' => $row['Kewarganegaraan'],
                'no_kitap' => $row['No Kitap'],
                'no_bpjs_kesehatan' => $row['No BPJS Kesehatan'],
                'nama_bank' => $row['Nama Bank'],
                'no_rekening_gaji' => $row['No Rekening Gaji'],
                'no_rekening_ppip' => $row['No Rekening PPIP'],
                'npwp' => $row['NPWP'],
                'no_handphone' => $row['No_Handphone'],
                'email' => $row['Email'],
                'unit_kerja' => $row['Unit Kerja'],
                'departemen' => $row['Departemen'],
                'division' => $row['Division'],
                'foto_pegawai' => $row['Foto Pegawai'],
                'kode_jabatan' => $this->cekJabatan($row['Jabatan']),
                'kode_tipe_pegawai' => $this->cekTipePegawai($row['Tipe Pegawai'])
            ]);
            if ($pegawai) {
                Kontrak::create([
                    'id_pegawai' => $pegawai->id,
                    'kontrak_1' => $row['Kontrak 1'],
                    'selesai_kontrak_1' => $row['Selesai Kontrak 1'],
                    'kontrak_2' => $row['Kontrak 2'],
                    'selesai_kontrak_2' => $row['Selesai Kontrak 2'],
                    'kontrak_3' => $row['Kontrak 3'],
                    'selesai_kontrak_3' => $row['Selesai Kontrak 3'],
                    'kontrak_4' => $row['Kontrak 4'],
                    'selesai_kontrak_4' => $row['Selesai Kontrak 4'],
                    'kontrak_5' => $row['Kontrak 5'],
                    'selesai_kontrak_5' => $row['Selesai Kontrak 5'],
                    'kontrak_6' => $row['Kontrak 6'],
                    'selesai_kontrak_6' => $row['Selesai Kontrak 6'],
                    'kontrak_7' => $row['Kontrak 7'],
                    'selesai_kontrak_7' => $row['Selesai Kontrak 7']
                ]);
            }
        }
    }
    public function chunkSize(): int
    {
        return 10;
    }
}
