<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pribasos extends Model
{
      use HasFactory;
    protected $table='siswas';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [

        'tanggal',
        'permasalahan',
        'penyelesaian',
        'id_guru',
        'id_siswa',
        'id_pelanggaran',
    ];

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

     public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }
         public function pelanggaran(): BelongsTo
    {
        return $this->belongsTo(Pelanggaran::class, 'id_pelanggaran', 'id_pelanggaran');
    }
}
