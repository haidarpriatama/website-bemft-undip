<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bidang_id',
        'name',
        'description',
    ];

    public function bidang() {
        return $this->belongsTo(Bidang::class);
    }

    public function programkerja() {
        return $this->hasMany(ProgramKerja::class);
    }

}
