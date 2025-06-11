<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spesialis extends Model
{
    use HasFactory;
    protected $table = 'spesialis_kejiwaans';

    protected $primaryKey = 'id_spesialis_kejiwaan';

    protected $fillable = [
        'nama',
        'spesialis',
        'jenis_kelamin',
        'id_user'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
