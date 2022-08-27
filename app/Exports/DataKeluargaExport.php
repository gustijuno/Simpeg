<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\Sheets\SheetKeluarga;
use App\Exports\Sheets\SheetAnak;
use App\Exports\Sheets\SheetPasangan;

class DataKeluargaExport implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        $sheets = [];
        $sheets[] = new SheetKeluarga();
        $sheets[] = new SheetPasangan();
        $sheets[] = new SheetAnak();

        return $sheets;
    }
}
