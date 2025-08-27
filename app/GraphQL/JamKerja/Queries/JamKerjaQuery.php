<?php

namespace App\GraphQL\JamKerja\Queries;

use App\Models\JamKerja\JamKerja;

class JamKerjaQuery
{
    public function getJamKerja($_, array $args)
    {
        $query = JamKerja::query();

        if (!empty($args['search'])) {
            $search = $args['search'];
            $query->where(function ($q) use ($search) {
                $q->where('user_id', 'like', "%{$search}%")
                  ->orWhere('tanggal', 'like', "%{$search}%")
                  ->orWhere('jam_masuk', 'like', "%{$search}%")
                  ->orWhere('jam_pulang', 'like', "%{$search}%");
            });
        }

        return $query->get();
    }

    public function allJamKerja()
    {
        return JamKerja::all();
    }
}
