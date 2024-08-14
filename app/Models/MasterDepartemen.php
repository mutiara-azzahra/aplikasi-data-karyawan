<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDepartemen extends Model
{
    use HasFactory;

    protected $table = 'master_departemen';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_departemen',
        'id_head_departemen', 
        'status_departemen',
        'status',
        'created_at',
        'updated_at',
        'created_by', 
        'updated_by'
    ];

    public function karyawan()
    {
        return $this->hasOne(MasterKaryawan::class, 'id', 'id_head_departemen');
    }
}
