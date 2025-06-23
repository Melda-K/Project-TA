<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan_bks';

    protected $primaryKey = 'id_pengaduan_bk';

    protected $fillable = [
        'tanggal',
        'jenis_pengaduan',
        'isi_keluhan',
        'id_siswa',
        'id_guru',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
