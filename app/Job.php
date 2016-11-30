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
}
