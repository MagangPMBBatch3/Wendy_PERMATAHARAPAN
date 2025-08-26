<?php

namespace App\GraphQL\JamPerTanggal\Queries;

use App\Models\JamPerTanggal\JamPerTanggal;

class JamPerTanggalQuery
{
    public function getJamPerTanggal($_, array $args)
    {
        $query = JamPerTanggal::query();

        if (!empty($args['search'])) {
            return $query->where('id', 'like', '%' . $args['search'] . '%')
                ->orWhere('no_wbs', 'like', '%' . $args['search'] . '%')
                ->orWhere('tanggal', 'like', '%' . $args['search'] . '%');
        }
        return $query->get();
    }

    public function allJamPerTanggal($_, array $args)
    {
        return JamPerTanggal::all();
    }
}
