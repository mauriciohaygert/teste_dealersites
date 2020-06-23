<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserAccess extends Model
{
    protected $table = 'users_access';
    public $timestamps = false;

    public function user_access()
    {
        return $this->belongsTo(User::class);
    }

}
