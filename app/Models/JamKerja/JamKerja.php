<?php

namespace App\Models\JamKerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JamKerja extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jam_kerja';
    
    protected $fillable = [
        'nama',
        'jam_mulai',
        'jam_selesai',
        'keterangan'
    ];

    protected $dates = ['deleted_at'];
}
