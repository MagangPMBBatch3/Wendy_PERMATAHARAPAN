<?php

namespace App\GraphQL\Bagian\Mutations;

use App\Models\Bagian\Bagians;

class BagianMutation {
    public function create($_, array $args)
    {
        return Bagians::create($args);
    }

    public function update($_, array $args)
    {
        $bagian = Bagians::findOrFail($args['id']);
        $bagian->update($args);
        return $bagian;
    }

    public function delete($_, array $args)
    {
        $bagian = Bagians::findOrFail($args['id']);
        $bagian->delete();
        return $bagian;
    }

    public function restore($_, array $args)
    {
        $bagian = Bagians::withTrashed()->findOrFail($args['id']);
        $bagian->restore();
        return $bagian;
    }

    public function forceDelete($_, array $args)
    {
        $bagian = Bagians::withTrashed()->findOrFail($args['id']);
        $bagian->forceDelete();
        return $bagian;
    }
}
