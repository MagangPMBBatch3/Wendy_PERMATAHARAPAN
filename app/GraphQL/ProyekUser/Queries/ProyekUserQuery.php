<?php

namespace App\GraphQL\ProyekUser\Queries;

use App\Models\ProyekUser\ProyekUser;

class ProyekUserQuery
{
    public function getProyekUser($_, array $args)
    {
        $query = ProyekUser::query();

        if (!empty($args['search'])) {
            $search = $args['search'];
            $query->where(function ($q) use ($search) {
                $q->where('proyek_id', 'like', "%{$search}%")
                  ->orWhere('user_id', 'like', "%{$search}%");
            });
        }

        return $query->get();
    }

    public function allProyekUser()
    {
        return ProyekUser::all();
    }
}
