<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class BusinessUnit extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'title',  'bu_key' ,'org_id','parent_id','is_active'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    
    public function parentbusinessdata(){
        return $this->hasOne('App\Models\BusinessUnit', 'id', 'parent_id');
    }

}

?>
