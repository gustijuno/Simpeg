<?php

namespace App\Imports\Sheets;

use App\Models\DataKeluarga;
use App\Models\DataPasangan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SheetImportPasangan implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as  $row) {
            $keluarga = DataKeluarga::where('no_kk', $row['No KK'])->first();
            DataPasangan::create([
                'id_keluarga' => $keluarga->id,
                'nama_lengkap' => $row['Nama Pasangan'],
                'nik' => $row['NIK'],
                'jenis_kelamin' => $row['Jenis Kelamin'],
                'tempat_lahir' => $row['Tempat Lahir'],
                'tanggal_lahir' => $row['Tanggal Lahir'],
                'agama' => $row['Agama'],
                'pendidikan' => $row['Pendidikan'],
                'jenis_pekerjaan' => $row['Jenis Pekerjaan'],
                'status_pernikahan' => $row['Status Pernikahan'],
                'status_hubungan_dalam_keluarga' => $row['Status Hubungan dalam Keluarga'],
                'kewarganegaraan' => $row['Kewarganegaraan'],
                'no_passport' => $row['No Passport'],
                'no_kitap' => $row['No Kitap'],
                'nama_ayah' => $row['Nama Ayah'],
                'nama_ibu' => $row['Nama Ibu']
            ]);
        }
    }
}
