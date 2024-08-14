<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJabatan extends Model
{
    use HasFactory;

    protected $table = 'master_jabatan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_jabatan',
        'status_jabatan',
        'status',
        'created_at',
        'updated_at',
        'created_by', 
        'updated_by'
    ];

    public function karyawan()
    {
        return $this->hasMany(MasterKaryawan::class, 'id_jabatan', 'id');
    }
    
}
