<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Session extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'user_id', 'is_login', 'login_time', 'logout_time'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id')->selectRaw('first_name,last_name,email, username, id, role_id,org_id,timezone_id');
    }

}

?>
