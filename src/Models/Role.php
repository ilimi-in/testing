<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Role extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['role_id','org_id','name','is_active','created','modified','default_name','is_view_flag'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

	
	/**
    *relationship with the user role table/model
    *
    */
    // public function UserRole(){
        // return $this->hasOne('Src\Models\UserRole','id');
    // }

    public function rolePermission(){
         return $this->hasMany(RolePermission::class,'role_id','role_id');
    }
	
}

?>
