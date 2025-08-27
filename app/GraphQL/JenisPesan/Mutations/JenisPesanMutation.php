<?php

namespace App\GraphQL\JenisPesan\Mutations;

use App\Models\JenisPesan\JenisPesan;
use Illuminate\Support\Facades\Validator;

class JenisPesanMutation
{
    public function create($_, array $args)
    {
        $validator = Validator::make($args, [
            'nama' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return JenisPesan::create($args);
    }

    public function update($_, array $args)
    {
        $validator = Validator::make($args, [
            'id' => 'required|integer',
            'nama' => 'sometimes|string|max:50',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $jenisPesan = JenisPesan::findOrFail($args['id']);
        $jenisPesan->update($args);

        return $jenisPesan;
    }

    public function restore($_, array $args)
    {
        $jenisPesan = JenisPesan::withTrashed()->findOrFail($args['id']);
        $jenisPesan->restore();

        return $jenisPesan;
    }

    public function forceDelete($_, array $args)
    {
        $jenisPesan = JenisPesan::withTrashed()->findOrFail($args['id']);
        $jenisPesan->forceDelete();

        return $jenisPesan;
    }
}
