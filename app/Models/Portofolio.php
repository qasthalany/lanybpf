<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    // Nama tabel pada database
    protected $table = 'Portofolio_1159';

    // Kolom yang boleh diisi melalui form
    protected $fillable = [
        'nama',
        'profesi',
        'tentang_saya',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'status',
        'kewarganegaraan',
        'alamat',
        'email',
        'no_hp',
        'sosial_media',
        'pendidikan',
        'pengalaman_kerja',
        'kemampuan',
        'foto_profil',
    ];

    // Satu CV dapat memiliki banyak proyek
    public function proyeks()
    {
        return $this->hasMany(Proyek::class, 'portofolio_id');
    }
}
