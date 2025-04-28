<?php

namespace App\Models;

use App\HasCreatorOrUpdater;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use hasFactory, HasCreatorOrUpdater, SoftDeletes, NodeTrait;

    public function isOwned($userId){
        return $this->created_by === $userId;
    }
}
