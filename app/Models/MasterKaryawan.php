<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKaryawan extends Model
{
    use HasFactory;

    protected $table = 'master_karyawan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'nama_karyawan',
        'email',
        'alamat',
        'nomor_telepon',
        'tempat_lahir',
        'tanggal_lahir',
        'foto_karyawan',
        'tanggal_awal_bekerja',
        'tanggal_akhir_bekerja',
        'id_jabatan',
        'id_departemen',
        'status_karyawan',
        'status',
        'created_at',
        'updated_at',
        'created_by', 
        'updated_by'
    ];

    public function departemen()
    {
        return $this->hasOne(MasterDepartemen::class, 'id', 'id_departemen');
    }

    public function jabatan()
    {
        return $this->hasOne(MasterJabatan::class, 'id', 'id_jabatan');
    }

}
