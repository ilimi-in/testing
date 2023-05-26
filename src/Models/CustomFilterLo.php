<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model as Model;

class CustomFilterLo extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'custom_filter_lo';
 
    protected $fillable = ['id', 'pathway_id', 'lo_id', 'filter_key', 'filter_value', 'created_at','created_by','updated_at','updated_by'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
   

}

?>

