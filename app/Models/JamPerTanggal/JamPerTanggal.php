<?php

namespace App\Models\JamPerTanggal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JamPerTanggal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jam_per_tanggal';

    protected $fillable = [
        'bagian_id',
        'no_wbs',
        'proyek_id',
        'tanggal',
        'jam'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jam' => 'decimal:2'
    ];
}
