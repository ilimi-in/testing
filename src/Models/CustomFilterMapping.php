<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class CustomFilterMapping extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'custom_filter_mapping';
    protected $timeStamp = true;
    protected $fillable = ['id', 'form_id', 'custom_filter_id', 'title', 'is_enable', 'created_by', 'updated_by'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */



   
}
