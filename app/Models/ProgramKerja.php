<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'divisi_id',
        'name',
        'description',
    ];

    public function divisi() {
        return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    }

}
