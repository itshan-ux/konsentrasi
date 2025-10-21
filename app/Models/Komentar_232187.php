<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User_232187; // model user custom


class Komentar_232187 extends Model
{
    use HasFactory;

    protected $table = 'komentars_232187'; // nama tabel

    protected $fillable = [
        'user_id',        // foreign key ke user
        'komentar',       // isi komentar
        'status_sentimen' // positif/negatif/netral
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User_232187::class, 'user_id', 'id_232187');
    }
}
