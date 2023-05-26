<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model as Model;

class FieldMaster extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'field_masters';
 
    protected $fillable = ['id', 'type', 'key_of_data','value_of_data','org_id','form_type','is_active','created_at','updated_at'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
   

}

?>

