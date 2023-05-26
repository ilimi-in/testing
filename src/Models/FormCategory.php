<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class FormCategory extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'org_id', 'created_at', 'updated_at'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

}

?>
