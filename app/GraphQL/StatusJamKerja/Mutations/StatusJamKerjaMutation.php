<?php

namespace App\GraphQL\StatusJamKerja\Mutations;

use App\Models\StatusJamKerja\StatusJamKerja;

class StatusJamKerjaMutation {
    public function create($_, array $args)
    {
        return StatusJamKerja::create($args);
    }

    public function update($_, array $args)
    {
        $statusJamKerja = StatusJamKerja::findOrFail($args['id']);
        $statusJamKerja->update($args);
        return $statusJamKerja;
    }

    public function restore($_, array $args)
    {
        $statusJamKerja = StatusJamKerja::withTrashed()->findOrFail($args['id']);
        $statusJamKerja->restore();
        return $statusJamKerja;
    }

    public function forceDelete($_, array $args)
    {
        $statusJamKerja = StatusJamKerja::withTrashed()->findOrFail($args['id']);
        $statusJamKerja->forceDelete();
        return $statusJamKerja;
    }
}
