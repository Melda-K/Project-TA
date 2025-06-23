<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwaljiwa extends Model
{
    use HasFactory;
    protected $table = 'jadwaljiwas';

    protected $primaryKey = 'id_jadwaljiwa';

    protected $fillable = [
        'kategori_jadwal',
        'hari',
        'jam',
        'id_spesialis_kejiwaan',
    ];

    public function spesialis(): BelongsTo
    {
        return $this->belongsTo(Spesialis::class, 'id_spesialis_kejiwaan');
    }
}
