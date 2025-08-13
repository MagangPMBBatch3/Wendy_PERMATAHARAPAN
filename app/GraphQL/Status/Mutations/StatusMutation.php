<?php
namespace App\GraphQL\status\Mutations;
use App\Models\status\Statuses;

class StatusMutation {
    public function restore($_, array $args)
    {
        $status = Statuses::withTrashed()->findOrFail($args['id']);
        $status->restore();
        return $status;

    }

    public function forceDelete($_, array $args)
    {
        $status = Statuses::withTrashed()->findOrFail($args['id']);
        $status->forceDelete();
        return $status;
    }
}


?>