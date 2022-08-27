<?php

namespace App\Imports\Sheets;

use App\Models\DataKeluarga;
use App\Models\Pegawai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class SheetImportKeluarga implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as  $row) {
            $pegawai = Pegawai::where('nip', $row['NIP Pegawai'])->first();
            DataKeluarga::create([
                'id_pegawai' => $pegawai->id,
                'no_kk' => $row['No KK'],
                'status_perkawinan' => $row['Status Perkawinan'],
                'dokumen_kk' => $row['Dokumen KK'],
                'status_anak' => $row['Status Anak']
            ]);
        }
    }
}
