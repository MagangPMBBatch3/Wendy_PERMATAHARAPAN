<?php

namespace App\GraphQL\JamKerja\Mutations;

use App\Models\JamKerja\JamKerja;
use Illuminate\Support\Facades\Validator;

class JamKerjaMutation
{
    public function create($_, array $args)
    {
        $validator = Validator::make($args, [
            'user_id' => 'required|integer',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_pulang' => 'required|date_format:H:i',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return JamKerja::create($args);
    }

    public function update($_, array $args)
    {
        $validator = Validator::make($args, [
            'id' => 'required|integer',
            'user_id' => 'sometimes|integer',
            'tanggal' => 'sometimes|date',
            'jam_masuk' => 'sometimes|date_format:H:i',
            'jam_pulang' => 'sometimes|date_format:H:i',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

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
