<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class TimezoneMaster extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    public $timestamps = true;
	protected $table = 'time_zone';
    protected $primaryKey = 'time_zone_id';
    protected $timeStamp = false;
    protected $fillable = ['time_zone','is_active'];

}

?>
