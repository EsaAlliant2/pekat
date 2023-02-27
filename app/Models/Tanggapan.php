<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';

    protected $primaryKey = 'id_tanggapan';

    protected $fillable = [
        'id_pengaduan',
        'fk_id_pengaduan',
        'tgl_tanggapan',
        'tanggapan',
        'fk_id_petugas',
    ];

    protected $hidden = [
    
    ];

    public function pengaduan()
    {
    	return $this->hasOne(Pengaduan::class,'id', 'id');
    }

    public function proses()
    {
    return $this->hasMany(Pengaduan::class, 'status_id','status');
    }

    public function country() {
        return $this->hasOne(Pengaduan::class);
    }
}