<?php

namespace App\Models\StatusJamKerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusJamKerja extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'status_jam_kerja';
    
    protected $fillable = [
        'nama',
        'kode',
        'deskripsi'
    ];

    protected $dates = ['deleted_at'];
}
