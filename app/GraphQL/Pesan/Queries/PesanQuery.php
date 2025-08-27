<?php

namespace App\GraphQL\Pesan\Queries;

use App\Models\Pesan\Pesan;

class PesanQuery
{
    public function getPesan($_, array $args)
    {
        $query = Pesan::query();

        if (!empty($args['search'])) {
            $search = $args['search'];
            $query->where(function ($q) use ($search) {
                $q->where('pengirim', 'like', "%{$search}%")
                  ->orWhere('penerima', 'like', "%{$search}%")
                  ->orWhere('isi', 'like', "%{$search}%")
                  ->orWhere('tgl_pesan', 'like', "%{$search}%")
                  ->orWhere('jenis_id', 'like', "%{$search}%")
                  ->orWhere('parent_id', 'like', "%{$search}%");
            });
        }

        return $query->get();
    }

    public function allPesan()
    {
        return Pesan::all();
    }
}
