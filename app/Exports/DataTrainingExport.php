<?php

namespace App\Exports;

use App\Models\DataTraining;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class DataTrainingExport implements FromCollection, WithHeadings, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $a = DataTraining::join('pegawai', 'pegawai.id', 'data_training.id_pegawai')
            ->select([
                'pegawai.nip',
                'pegawai.nama',
                'jenis_training',
                'penyelenggara',
                'lokasi_training',
                'waktu_mulai_pelaksanaan',
                'waktu_selesai_pelaksanaan',
                'dokumen_data_training'
            ])
            ->get();
        return $a;
    }
    public function headings(): array
    {
        $header = [
            "NIP Pegawai",
            "Nama Pegawai",
            "Jenis Training",
            "Penyelenggara",
            "Lokasi Training",
            "Waktu Mulai Pelaksanaan",
            "Waktu Selesai Pelaksanaan",
            "Dokumen Data Training"
        ];
        return $header;
    }
    public function title(): string
    {
        return 'Data Training';
    }
}
