<?php

namespace App\GraphQL\Aktivitas\Queries;

use App\Models\aktivitas\Aktivitas;

class AktivitasQuery
{
    public function getAktivitas($_, array $args)
    {
        $query = Aktivitas::query();

        if (!empty($args['search'])) {
            return $query->where('id', 'like', '%' . $args['search'] . '%')
                ->orWhere('nama', 'like', '%' . $args['search'] . '%')
                ->orWhere('deskripsi', 'like', '%' . $args['search'] . '%');
        }
        return $query->get();
    }

    public function allAktivitas()
    {
        return Aktivitas::all();
    }

    public function allArsip($_, array $args)
    {
        return Aktivitas::onlyTrashed()->get();
    }
}
