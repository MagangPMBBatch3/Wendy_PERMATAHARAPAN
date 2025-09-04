<?php

namespace App\GraphQL\Aktivitas\Mutations;

use App\Models\aktivitas\Aktivitas;
use Illuminate\Support\Facades\Validator;

class AktivitasMutation
{
    public function create($_, array $args)
    {
        $validator = Validator::make($args, [
            'bagian_id' => 'nullable|integer|exists:bagians,id',
            'no_wbs' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return Aktivitas::create($args);
    }

    public function update($_, array $args)
    {
        $validator = Validator::make($args, [
            'id' => 'required|integer|exists:aktivitas,id',
            'bagian_id' => 'nullable|integer|exists:bagians,id',
            'no_wbs' => 'sometimes|required|string|max:255',
            'nama' => 'sometimes|required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $aktivitas = Aktivitas::findOrFail($args['id']);
        unset($args['id']); // Remove id from update data
        $aktivitas->update($args);

        return $aktivitas;
    }

    public function delete($_, array $args)
    {
        $validator = Validator::make($args, [
            'id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $aktivitas = Aktivitas::findOrFail($args['id']);
        $aktivitas->delete();

        return $aktivitas;
    }

    public function restore($_, array $args)
    {
        $validator = Validator::make($args, [
            'id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $aktivitas = Aktivitas::withTrashed()->findOrFail($args['id']);
        $aktivitas->restore();

        return $aktivitas;
    }

    public function forceDelete($_, array $args)
    {
        $validator = Validator::make($args, [
            'id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $aktivitas = Aktivitas::withTrashed()->findOrFail($args['id']);
        $aktivitas->forceDelete();

        return $aktivitas;
    }
}
