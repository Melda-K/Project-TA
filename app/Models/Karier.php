<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Karier extends Model
{
    use HasFactory;
    protected $table = 'kariers';
    protected $primaryKey = 'id_karier';

    protected $fillable = [

        'tanggal',
        'kampus',
        'prodi',
        'keterangan',
        'id_siswa',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }
}
