<?php

namespace App\Exports\Sheets;

use App\Models\DataKeluarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;


class SheetKeluarga implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        return DataKeluarga::leftJoin('pegawai', 'pegawai.id', 'data_keluarga.id_pegawai')
            ->select([
                'pegawai.nip',
                'pegawai.nama',
                'no_kk',
                'status_perkawinan',
                'dokumen_kk',
                'status_anak',
            ])->get();
    }
    public function headings(): array
    {
        $data = [
            "NIP Pegawai",
            "Nama Pegawai",
            "No KK",
            "Status Perkawinan",
            "Dokumen KK",
            "Status Anak",
        ];
        return [$data];
    }
    public function title(): string
    {
        return 'Data Keluarga';
    }
}
