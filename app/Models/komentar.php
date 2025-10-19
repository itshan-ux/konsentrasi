<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentars_232187'; // nama tabel sesuai database

    protected $fillable = [
        'isi_komentar_232187',
        'sentimen_232187',
        'user_232187', // Hapus spasi di akhir!
    ];

    /**
     * Relasi ke tabel users
     * Setiap komentar dimiliki oleh satu user
     */
    public function user()
    {
        // Jika nama kolom foreign key bukan 'user_id',
        // maka tulis secara eksplisit seperti ini:
        return $this->belongsTo(User::class, 'user_232187', 'id');
    }
}
