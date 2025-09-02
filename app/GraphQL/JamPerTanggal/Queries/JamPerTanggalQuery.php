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

    public function allJamPerTanggalArsip($_, array $args)
    {
        return JamPerTanggal::onlyTrashed()->get();
    }

    public function jamPerTanggal($_, array $args)
    {
        return JamPerTanggal::find($args['id']);
    }

    public function jamPerTanggalByNoWbs($_, array $args)
    {
        return JamPerTanggal::where('no_wbs', 'like', '%' . $args['no_wbs'] . '%')->get();
    }
}
