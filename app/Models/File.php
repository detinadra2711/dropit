<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class File extends Model
{
    use HasFactory;

    protected $table = 'file';
    protected $fillable = [
        'user_id', 'name', 'nomor_dokumen', 'tgl_dokumen', 'url', 'is_active'
    ];

    // public function getCreateAttribute(){
    //     return Carbon::parse($this->attributes['created_at'])
    //     -> translatedFormat()
    // }
}
