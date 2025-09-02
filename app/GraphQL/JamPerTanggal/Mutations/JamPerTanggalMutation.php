<?php

namespace App\GraphQL\JamPerTanggal\Mutations;

use App\Models\JamPerTanggal\JamPerTanggal;

class JamPerTanggalMutation {
    public function create($_, array $args)
    {
        return JamPerTanggal::create($args);
    }

    public function update($_, array $args)
    {
        $jamPerTanggal = JamPerTanggal::findOrFail($args['id']);
        $jamPerTanggal->update($args);
        return $jamPerTanggal;
    }

    public function restore($_, array $args)
    {
        $jamPerTanggal = JamPerTanggal::withTrashed()->findOrFail($args['id']);
        $jamPerTanggal->restore();
        return $jamPerTanggal;
    }

    public function forceDelete($_, array $args)
    {
        $jamPerTanggal = JamPerTanggal::withTrashed()->findOrFail($args['id']);
        $jamPerTanggal->forceDelete();
        return $jamPerTanggal;
    }

    public function deleteJamPerTanggal($_, array $args)
    {
        $jamPerTanggal = JamPerTanggal::findOrFail($args['id']);
        $jamPerTanggal->delete();
        return $jamPerTanggal;
    }
}
