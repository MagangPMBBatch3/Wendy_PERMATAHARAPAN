<?php

namespace App\GraphQL\Proyek\Mutations;

use App\Models\Proyek\Proyek;

class ProyekMutation {
    public function create($_, array $args)
    {
        return Proyek::create($args);
    }

    public function update($_, array $args)
    {
        $proyek = Proyek::findOrFail($args['id']);
        $proyek->update($args);
        return $proyek;
    }

    public function delete($_, array $args)
    {
        $proyek = Proyek::findOrFail($args['id']);
        $proyek->delete();
        return $proyek;
    }

    public function restore($_, array $args)
    {
        $proyek = Proyek::withTrashed()->findOrFail($args['id']);
        $proyek->restore();
        return $proyek;
    }

    public function forceDelete($_, array $args)
    {
        $proyek = Proyek::withTrashed()->findOrFail($args['id']);
        $proyek->forceDelete();
        return $proyek;
    }
}
