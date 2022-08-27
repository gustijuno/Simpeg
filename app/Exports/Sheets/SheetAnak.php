<?php

namespace App\Exports\Sheets;

use App\Models\DataAnak;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class SheetAnak implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        return
            DB::table('data_keluarga')
            ->rightJoin('data_anak', 'data_anak.id_keluarga', 'data_keluarga.id')
            ->select([
                'data_keluarga.no_kk',
                'data_anak.nama_lengkap',
                'data_anak.nik',
                'data_anak.jenis_kelamin',
                'data_anak.tempat_lahir',
                'data_anak.tanggal_lahir',
                'data_anak.agama',
                'data_anak.pendidikan',
                'data_anak.jenis_pekerjaan',
                'data_anak.status_pernikahan',
                'data_anak.status_hubungan_dalam_keluarga',
                'data_anak.kewarganegaraan',
                'data_anak.no_passport',
                'data_anak.no_kitap',
                'data_anak.nama_ayah',
                'data_anak.nama_ibu',
            ])->get();
    }
    public function headings(): array
    {
        $data = [
            "No KK",
            "Nama Anak",
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
        return 'Data Anak';
    }
}
