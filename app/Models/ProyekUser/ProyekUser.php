<?php

namespace App\Models\ProyekUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProyekUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'proyek_user';

    protected $fillable = [
        'proyek_id',
        'user_id'
    ];
}
