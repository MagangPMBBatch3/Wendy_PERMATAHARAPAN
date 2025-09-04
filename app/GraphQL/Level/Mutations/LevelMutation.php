<?php
namespace App\GraphQL\Level\Mutations;
use App\Models\Level\Level;

class LevelMutation {
    public function create($_, array $args)
    {
        return Level::create($args);
    }

    public function update($_, array $args)
    {
        $level = Level::findOrFail($args['id']);
        $level->update($args);
        return $level;
    }

    public function delete($_, array $args)
    {
        $level = Level::findOrFail($args['id']);
        $level->delete();
        return $level;
    }

    public function restore($_, array $args)
    {
        $level = Level::withTrashed()->findOrFail($args['id']);
        $level->restore();
        return $level;
    }

    public function forceDelete($_, array $args)
    {
        $level = Level::withTrashed()->findOrFail($args['id']);
        $level->forceDelete();
        return $level;
    }
}

?>
