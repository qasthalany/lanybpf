<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'Biodata_1159';

    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'alamat',
        'foto_profil',
    ];

    public function hobi()
    {
        return $this->hasMany(Hobi::class, 'biodata_id');
    }
}
