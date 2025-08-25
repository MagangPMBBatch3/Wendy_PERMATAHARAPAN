<?php

namespace App\GraphQL\Aktivitas\Mutations;

use App\Models\aktivitas\Aktivitas;

class AktivitasMutation {
    public function create($_, array $args)
    {
        return Aktivitas::create($args);
    }

    public function update($_, array $args)
    {
        $aktivitas = Aktivitas::findOrFail($args['id']);
        $aktivitas->update($args);
        return $aktivitas;
    }

    public function restore($_, array $args)
    {
        $aktivitas = Aktivitas::withTrashed()->findOrFail($args['id']);
        $aktivitas->restore();
        return $aktivitas;
    }

    public function forceDelete($_, array $args)
    {
        $aktivitas = Aktivitas::withTrashed()->findOrFail($args['id']);
        $aktivitas->forceDelete();
        return $aktivitas;
    }
}
