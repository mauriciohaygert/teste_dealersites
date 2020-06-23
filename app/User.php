<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserAccess;

class User extends Model
{
    public $timestamps = false;

    public function user_access()
    {
        return $this->hasMany(UserAccess::class);
    }

    public function list_users()
    {
        $users = User::withCount('user_access')->get();
        
        return $users;
    }
}
