<?php

namespace App\GraphQL\Bagian\Queries;

use App\Models\Bagian\Bagians;

class BagianQuery
{
    public function getBagians($_, array $args)
    {
        $query = Bagians::query();

        if (!empty($args['search'])) {
            return $query->where('id', 'like', '%' . $args['search'] . '%')
                ->orWhere('nama', 'like', '%' . $args['search'] . '%')
                ->orWhere('kode', 'like', '%' . $args['search'] . '%')
                ->get();
        }
        return $query->get();
    }

    public function allArsip($_, array $args)
    {
        return Bagians::onlyTrashed()->get();
    }
}
