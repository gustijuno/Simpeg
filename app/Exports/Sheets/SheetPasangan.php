<?php

namespace App\Exports\Sheets;

use App\Models\DataPasangan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class SheetPasangan implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        return DB::table('data_keluarga')
            ->rightJoin('data_pasangan', 'data_pasangan.id_keluarga', 'data_keluarga.id')
            ->select([
                'data_keluarga.no_kk',
                'data_pasangan.nama_lengkap',
                'data_pasangan.nik',
                'data_pasangan.jenis_kelamin',
                'data_pasangan.tempat_lahir',
                'data_pasangan.tanggal_lahir',
                'data_pasangan.agama',
                'data_pasangan.pendidikan',
                'data_pasangan.jenis_pekerjaan',
                'data_pasangan.status_pernikahan',
                'data_pasangan.status_hubungan_dalam_keluarga',
                'data_pasangan.kewarganegaraan',
                'data_pasangan.no_passport',
                'data_pasangan.no_kitap',
                'data_pasangan.nama_ayah',
                'data_pasangan.nama_ibu',
            ])->get();
    }
    public function headings(): array
    {
        $data = [
            "No KK",
            "Nama Pasangan",
            "NIK",
            "Jenis Kelamin",
            "Tempat Lahir",
            "Tanggal Lahir",
            "Agama",
            "Pendidikan",
            "Jenis Pekerjaan",
            "Status Pernikahan",
            "Status Hubungan dalam Keluarga",
            "Kewarganegaraan",
            "No Passport",
            "No Kitap",
            "Nama Ayah",
            "Nama Ibu",
        ];
        return [$data];
    }
    public function title(): string
    {
        return 'Data Pasangan';
    }
}
