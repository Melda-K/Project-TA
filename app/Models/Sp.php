<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sp extends Model
{
    use HasFactory;
    protected $table = 'sps';
    protected $primaryKey = 'id_sp';

    protected $fillable = [

        'tanggal',
        'jenis_sp',
        'dokumen_sp',
        'id_siswa',
    ];
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }
}
