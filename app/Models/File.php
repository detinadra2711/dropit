<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'file';

    protected $fillable = [
        'user_id', 'kategori_id', 'name', 'bagian_id', 'nomor_dokumen', 'tgl_dokumen', 'catatan', 'url', 'is_active',
    ];
}
