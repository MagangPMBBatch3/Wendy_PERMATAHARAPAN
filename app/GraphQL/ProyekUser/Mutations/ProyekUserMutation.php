<?php

namespace App\GraphQL\ProyekUser\Mutations;

use App\Models\ProyekUser\ProyekUser;
use Illuminate\Support\Facades\Validator;

class ProyekUserMutation
{
    public function create($_, array $args)
    {
        $validator = Validator::make($args, [
            'proyek_id' => 'required|integer|exists:proyek,id',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return ProyekUser::create($args);
    }

    public function update($_, array $args)
    {
        $validator = Validator::make($args, [
            'id' => 'required|integer',
            'proyek_id' => 'sometimes|integer|exists:proyek,id',
            'user_id' => 'sometimes|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $proyekUser = ProyekUser::findOrFail($args['id']);
        $proyekUser->update($args);

        return $proyekUser;
    }

    public function restore($_, array $args)
    {
        $proyekUser = ProyekUser::withTrashed()->findOrFail($args['id']);
        $proyekUser->restore();

        return $proyekUser;
    }

    public function forceDelete($_, array $args)
    {
        $proyekUser = ProyekUser::withTrashed()->findOrFail($args['id']);
        $proyekUser->forceDelete();

        return $proyekUser;
    }
}
