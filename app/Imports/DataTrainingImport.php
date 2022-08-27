<?php

namespace App\Imports;

use App\Models\DataTraining;
use App\Models\Pegawai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class DataTrainingImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as  $row) {
            $pegawai = Pegawai::where('nip', $row['NIP Pegawai'])->first();
            DataTraining::create([
                'id_pegawai' => $pegawai->id,
                'jenis_training' => $row['Jenis Training'],
                'penyelenggara' => $row['Penyelenggara'],
                'lokasi_training' => $row['Lokasi Training'],
                'waktu_mulai_pelaksanaan' => $row['Waktu Mulai Pelaksanaan'],
                'waktu_selesai_pelaksanaan' => $row['Waktu Selesai Pelaksanaan'],
                'dokumen_data_training' => $row['Dokumen Data Training']
            ]);
        }
    }
}
