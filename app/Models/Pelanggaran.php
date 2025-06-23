<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $table='pelanggarans';
    protected $primaryKey = 'id_pelanggaran';

    protected $fillable = [

        'tanggal',
        'point_pelanggaran',
        'jmlh_pelanggaran',
        'saldo_pelanggaran',
        'keterangan',
        'id_siswa',
        'id_guru',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
}
