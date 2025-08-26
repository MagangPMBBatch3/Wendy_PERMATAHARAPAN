<?php

namespace App\Models\JenisPesan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPesan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jenis_pesan';

    protected $fillable = [
        'nama'
    ];
}
