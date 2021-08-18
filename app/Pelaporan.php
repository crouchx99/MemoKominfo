<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    protected $table = 'berita';
    
    protected $fillable = [
        'judul_berita', 'kategori_berita', 'isi_berita', 'media', 'jenis_berita', 'saran', 'upload_gambar'
        ];

    protected $hidden = [
        'created_at', 'updated_at',
        ];

}
