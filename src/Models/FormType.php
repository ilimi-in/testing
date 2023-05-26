<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class FormType extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'parent_id','is_work_flow', 'name', 'form_key', 'org_id','category_id','is_resource_page', 'created_at', 'updated_at'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function formCategory() {
        return $this->hasOne('App\Models\FormCategory', 'id', 'category_id');
    }

}

?>
