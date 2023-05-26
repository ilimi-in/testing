<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model as Model;

class Lo extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'los';
 
    protected $fillable = ['id', 'pathway_id', 'section_id','type','title','image','description','position','alt_description','provider','content_type','level','duration','avg_rating','url','mongo_id', 'sequence_start', 'sequence_num', 'unlock_lo', 'org_id', 'is_mandatory', 'is_testout', 'is_active','created_at','created_by','updated_at','updated_by'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
   

}

?>

