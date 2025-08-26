<?php

namespace App\GraphQL\ModeJamKerja\Queries;

use App\Models\ModeJamKerja\ModeJamKerja;

class ModeJamKerjaQuery
{
    public function getModeJamKerja($_, array $args)
    {
        $query = ModeJamKerja::query();

        if (!empty($args['search'])) {
            return $query->where('id', 'like', '%' . $args['search'] . '%')
                ->orWhere('nama', 'like', '%' . $args['search'] . '%');
        }
        return $query->get();
    }

    public function allModeJamKerja($_, array $args)
    {
        return ModeJamKerja::all();
    }
}
