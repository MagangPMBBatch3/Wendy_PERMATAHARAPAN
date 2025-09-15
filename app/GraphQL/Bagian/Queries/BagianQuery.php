<?php

namespace App\GraphQL\Bagian\Queries;

use App\Models\Bagian\Bagians;

class BagianQuery
{
    public function getBagians($_, array $args)
    {
        $query = Bagians::query();

        if (!empty($args['search'])) {
            return $query->where('id', 'like', '%' . $args['search'] . '%')
                ->orWhere('nama', 'like', '%' . $args['search'] . '%')
                ->get();
        }
        $perPage = $args['first'] ?? 10;
        $page = $args['page'] ?? 1;

        $paginator = $query->paginate($perPage, ['*'],'page', $page);
        return [
            'data' =>$paginator->items(),
            'paginatorinfo' => [
                'hasMorePages' => $paginator->hasMorePages(),
                'currenPage'=> $paginator->currentPage(),
                'lastPage'=> $paginator->lastPage(),
                'perPage'=> $paginator->perPage(),
                'total'=> $paginator->total(),

            ],
        ];
    
    }

    public function allArsip($_, array $args)
    {
        return Bagians::onlyTrashed()->get();
    }
}
