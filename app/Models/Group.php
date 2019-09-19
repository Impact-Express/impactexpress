<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;

class Group extends Model
{
    /**
     * Define Relationships
     */
    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
