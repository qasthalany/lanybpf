<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $table = 'Hobi_1159';

    protected $fillable = [
        'biodata_id',
        'nama_hobi',
        'kategori',
        'keterangan',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'biodata_id');
    }
}

