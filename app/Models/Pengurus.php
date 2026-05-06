<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Pengurus extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'pengurus', $guarded;

    public function bidang(){
        return $this->belongsTo(Bidang::class, 'bidang_id', 'id');
    }

    public function divisi(){
        return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    }

    public function programkerja(){
        return $this->belongsTo(ProgramKerja::class, 'proker_id', 'id');
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function jabatan() {
        return $this->belongsToMany(Jabatan::class, 'jabatan_pengurus', 'pengurus_id', 'jabatan_id')
            ->withPivot(['rank', 'tahun_kepengurusan']);
    }

}
