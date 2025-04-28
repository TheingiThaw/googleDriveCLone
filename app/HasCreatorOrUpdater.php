<?php

namespace App;

trait HasCreatorOrUpdater
{
    //
    protected static function bootHasCreatorOrUpdater(){
        static::creating(function($model){
            $model->created_by(auth()->user()->id);
            $moodel->updated_by(auth()->user()->id);
        });

        static::updating(function($model){
            $moodel->updated_by(auth()->user()->id);
        });
    }
}
