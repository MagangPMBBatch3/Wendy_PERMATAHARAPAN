<?php

namespace App\GraphQL\JamKerja\Mutations;

use App\Models\JamKerja\JamKerja;

class JamKerjaMutation {
    public function create($_, array $args)
    {
        return JamKerja::create($args);
    }

    public function update($_, array $args)
    {
        $jamKerja = JamKerja::findOrFail($args['id']);
        $jamKerja->update($args);
        return $jamKerja;
    }

    public function restore($_, array $args)
    {
        $jamKerja = JamKerja::withTrashed()->findOrFail($args['id']);
        $jamKerja->restore();
        return $jamKerja;
    }

    public function forceDelete($_, array $args)
    {
        $jamKerja = JamKerja::withTrashed()->findOrFail($args['id']);
        $jamKerja->forceDelete();
        return $jamKerja;
    }
}
