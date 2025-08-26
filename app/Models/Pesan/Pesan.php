<?php

namespace App\Models\Pesan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pesan';

    protected $fillable = [
        'pengirim',
        'penerima',
        'isi',
        'parent_id',
        'tgl_pesan',
        'jenis_id'
    ];

    protected $casts = [
        'tgl_pesan' => 'datetime'
    ];
}
