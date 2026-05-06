<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $guarded;

    public function penguruses() {
        return $this->belongsToMany(Pengurus::class, 'jabatan_pengurus', 'jabatan_id', 'pengurus_id')->withPivot(['rank', 'tahun_kepengurusan']);
    }
}
