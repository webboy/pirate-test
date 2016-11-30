<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
	 * Database table name
	 * @var string
	 */
	protected $table = 'jobs';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'email', 'user_id'
    ];

    //User relation
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * Scope a query to only include published jobs.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
    
}
