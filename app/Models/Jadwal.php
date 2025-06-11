<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';

    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'hari',
        'jam',
        'id_guru',
        'id_spesialis_kejiwaan',
    ];

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

     public function spesialis(): BelongsTo
    {
        return $this->belongsTo(Spesialis::class, 'id_spesialis_kejiwaan');
    }
}
