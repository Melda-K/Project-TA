<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Belajar extends Model
{
    use HasFactory;
    protected $table = 'belajars';

    protected $primaryKey = 'id_belajar';

    protected $fillable = [
        'tanggal',
        'permasalahan',
        'mapel',
        'keterangan',
        'id_guru',
        'id_siswa',
    ];

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

     public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
