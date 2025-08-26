<?php

namespace App\GraphQL\ModeJamKerja\Mutations;

use App\Models\ModeJamKerja\ModeJamKerja;

class ModeJamKerjaMutation {
    public function create($_, array $args)
    {
        return ModeJamKerja::create($args);
    }

    public function update($_, array $args)
    {
        $modeJamKerja = ModeJamKerja::findOrFail($args['id']);
        $modeJamKerja->update($args);
        return $modeJamKerja;
    }

    public function restore($_, array $args)
    {
        $modeJamKerja = ModeJamKerja::withTrashed()->findOrFail($args['id']);
        $modeJamKerja->restore();
        return $modeJamKerja;
    }

    public function forceDelete($_, array $args)
    {
        $modeJamKerja = ModeJamKerja::withTrashed()->findOrFail($args['id']);
        $modeJamKerja->forceDelete();
        return $modeJamKerja;
    }
}
