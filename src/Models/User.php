<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['first_name', 'last_name', 'username', 'email', 'password', 'profile_image', 'contact_no', 'job_role', 'role_id', 'org_id', 'business_unit', 'timezone_id', 'nbkid', 'timezone', 'is_active', 'allowed_csr_exemption', 'allowed_home_banner', 'maintainance_team', 'person_number', 'last_login', 'company', 'country', 'manager_bemsid', 'sfdc_ref_id', 'sfdc_updated_at', 'sfdc_ref_id_lrf', 'sfdc_updated_at_lrf', 'is_mantis_user', 'company_id', 'country_id','created_by_user','updated_by_user'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * relationship with the user role table/model
     *
     */
    // public function UserRole(){
    // return $this->hasOne('Src\Models\UserRole','id');
    // }

    public function timezone()
    {
        return $this->hasOne('Src\Models\Timezone', 'id', 'timezone_id');
    }
	
	public function timezoneMaster()
    {
        return $this->hasOne('App\Models\TimezoneMaster', 'time_zone_id', 'timezone_id');
    }

    public function businessUnit()
    {
        return $this->hasOne('App\Models\BusinessUnit', 'id', 'business_unit');
    }

    public function userBusinessUnit()
    {
        return $this->hasOne('Src\Models\UserBusinessUnit', 'user_id', 'id');
    }

    public function createdbyuser()
    {
        return $this->hasOne('Src\Models\User', 'id', 'created_by_user')->selectRaw('id, role_id,first_name,last_name');
    }
	
    public function UserRoleMapping(){
        return $this->hasOne('Src\Models\UserRoleMapping','user_id','id');
    }
    public function userData(){
        return $this->hasOne('Src\Models\UserData','user_id','id');
    }

    public function userRole(){
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
