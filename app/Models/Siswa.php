<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [

        'nama_siswa',
        'nis',
        'ttl',
        'jenis_kelamin',
        'agama',
        'pendik_sebelumnya',
        'jmlh_sodara',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'wali_siswa',
        'kelas',
        'jenis_kelamin',
        'tahun_pelajaran',
        'id_user',
        'id_guru'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    public function pelanggarans()
    {
        return $this->hasMany(Pelanggaran::class, 'id_siswa');
    }
}
