<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    protected $table = 'data_keluarga';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_pegawai',
        'no_kk',
        'status_perkawinan',
        'dokumen_kk',
        'status_anak'
    ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
    public function pasangan()
    {
        return $this->hasOne(DataPasangan::class, 'id_keluarga');
    }
    public function anak()
    {
        return $this->hasMany(DataAnak::class, 'id_keluarga');
    }
}
