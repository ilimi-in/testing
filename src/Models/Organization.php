<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Organization extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['org_id','name','title','logo_path','banner_path','is_active','created','modified','login_type','copied_from_org','is_base_org','org_message','niit_authorized_signatory','e_signature_applicable','address','css_applicable','currency','css_signatory','cust_country','cust_name','cust_legalRep','contact_us','lms_url','microsite_url','milestone_view_work_order_menu','training_target','moderator_fee','global_form','training_target','delivery_form','hide_service','milestone_start_date_month'];

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
	
}

?>
