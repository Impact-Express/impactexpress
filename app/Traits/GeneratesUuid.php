<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait GeneratesUuid
{
    protected static function bootGeneratesUuid()
    {
        static::creating(function($model) {
            if (Schema::hasColumn($model->getTable(), 'uuid') && !$model->uuid) {
                $model->uuid = (string)Str::uuid();
            }
        });
    }
}
