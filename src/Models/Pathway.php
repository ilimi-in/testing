<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class Pathway extends Model {

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*use SoftDeletes;*/
    protected $fillable = ['id', 'title', 'description', 'thumb_image', 'background', 'duration', 'proficency_level', 'availability', 'offer_accreditation', 'accreditation_organization', 'cpe_type', 'cpe_hrs', 'field_study', 'certification', 'deactivate_on', 'proedge_search_recom', 'proedge_recom', 'proedge_rating_review', 'pathway_search', 'pathway_display_progress', 'pathway_enable_filters', 'is_content_type', 'is_provider', 'is_duration', 'total_section', 'pathway_type', 'position', 'completion_min', 'mongo_id', 'org_id', 'is_active', 'created_at', 'created_by', 'updated_at', 'updated_by'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $table = 'pathways';
}