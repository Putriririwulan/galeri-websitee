<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    protected $table = 'tentang_kami'; // 🔑 nama tabel di database
    protected $fillable = ['judul', 'deskripsi', 'gambar', 'visi', 'misi'];
}
