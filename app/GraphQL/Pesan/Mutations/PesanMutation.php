<?php

namespace App\GraphQL\Pesan\Mutations;

use App\Models\Pesan\Pesan;
use Illuminate\Support\Facades\Validator;

class PesanMutation
{
    public function create($_, array $args)
    {
        $validator = Validator::make($args, [
            'pengirim' => 'required|string|max:100',
            'penerima' => 'required|string|max:100',
            'isi' => 'required|string',
            'tgl_pesan' => 'required|date',
            'jenis_id' => 'required|integer|exists:jenis_pesan,id',
            'parent_id' => 'nullable|integer|exists:pesan,id',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return Pesan::create($args);
    }

    public function update($_, array $args)
    {
        $validator = Validator::make($args, [
            'id' => 'required|integer',
            'pengirim' => 'sometimes|string|max:100',
            'penerima' => 'sometimes|string|max:100',
            'isi' => 'sometimes|string',
            'tgl_pesan' => 'sometimes|date',
            'jenis_id' => 'sometimes|integer|exists:jenis_pesan,id',
            'parent_id' => 'nullable|integer|exists:pesan,id',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $pesan = Pesan::findOrFail($args['id']);
        $pesan->update($args);

        return $pesan;
    }

    public function restore($_, array $args)
    {
        $pesan = Pesan::withTrashed()->findOrFail($args['id']);
        $pesan->restore();

        return $pesan;
    }

    public function forceDelete($_, array $args)
    {
        $pesan = Pesan::withTrashed()->findOrFail($args['id']);
        $pesan->forceDelete();

        return $pesan;
    }
}
