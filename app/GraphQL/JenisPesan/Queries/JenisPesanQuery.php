<?php

namespace App\GraphQL\JenisPesan\Queries;

use App\Models\JenisPesan\JenisPesan;

class JenisPesanQuery
{
    public function getJenisPesan($_, array $args)
    {
        $query = JenisPesan::query();

        if (!empty($args['search'])) {
            $search = $args['search'];
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhere('nama', 'like', "%{$search}%");
            });
        }

        return $query->get();
    }

    public function allJenisPesan()
    {
        return JenisPesan::all();
    }
}
