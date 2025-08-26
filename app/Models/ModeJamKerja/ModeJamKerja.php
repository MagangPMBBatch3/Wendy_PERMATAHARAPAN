<?php

namespace App\Models\ModeJamKerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModeJamKerja extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mode_jam_kerja';

    protected $fillable = [
        'nama'
    ];
}
