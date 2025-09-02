<?php

namespace App\GraphQL\StatusJamKerja\Queries;

use App\Models\StatusJamKerja\StatusJamKerja;

class StatusJamKerjaQuery
{
    public function getStatusJamKerja($_, array $args)
    {
        $query = StatusJamKerja::query();

        if (!empty($args['search'])) {
            return $query->where('id', 'like', '%' . $args['search'] . '%')
                ->orWhere('nama', 'like', '%' . $args['search'] . '%');
        }
        return $query->get();
    }

    public function allArsip($_, array $args)
    {
        return StatusJamKerja::onlyTrashed()->get();
    }
}
