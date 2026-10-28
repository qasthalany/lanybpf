<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'Proyek_1159';

    protected $fillable = [
        'portofolio_id',
        'nama_proyek',
        'kategori',
        'deskripsi',
        'teknologi',
        'tanggal_proyek',
        'gambar',
        'link_proyek',
    ];

    // Relasi ke tabel Portofolio_1159
    public function portofolio()
    {
        return $this->belongsTo(
            Portofolio::class,
            'portofolio_id'
        );
    }
}
