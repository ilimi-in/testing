<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model as Model;

class PathwayContent extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    
 
    protected $fillable = ['id', 'pathway_id', 'parent_id','type_id','category','lo_type','title','image','description','position','alt_description','provider','content_type','level','duration','avg_rating','url','mongo_id', 'sequence_start', 'sequence_num', 'unlock', 'org_id', 'dependent_section', 'completion_min', 'section_branch', 'is_mandatory', 'is_testout', 'is_active','created_at','created_by','updated_at','updated_by'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    protected $table = 'pathway_content';

}

?>

