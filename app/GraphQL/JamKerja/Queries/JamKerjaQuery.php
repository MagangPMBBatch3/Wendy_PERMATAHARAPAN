<?php

namespace App\GraphQL\JamKerja\Queries;

use App\Models\JamKerja\JamKerja;

class JamKerjaQuery
{
    public function getJamKerja($_, array $args)
    {
        $query = JamKerja::query();

        if (!empty($args['search'])) {
            return $query->where('id', 'like', '%' . $args['search'] . '%')
                ->orWhere('nama', 'like', '%' . $args['search'] . '%')
                ->orWhere('jam_mulai', 'like', '%' . $args['search'] . '%')
                ->orWhere('jam_selesai', 'like', '%' . $args['search'] . '%');
        }
        return $query->get();
    }

    public function allArsip($_, array $args)
    {
        return JamKerja::onlyTrashed()->get();
    }
}
