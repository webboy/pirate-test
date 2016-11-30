<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\JobCreateRequest;

use App\Job;

class JobController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobCreateRequest $request)
    {
        $user = \Auth::user();
        $job = Job::create($request->all());

        if ($user->jobs->count() == 0)
        {
            //It is a first Job posting
            
        } else {
            // It is not first, set status to published
            $job->status = 1;
        }
        
        $job->user()->associate($user);
        $job->save();

        return redirect('/home')->with('status', 'Job post created');
    }    

    /**
     * Publish the Job
     *
     * @param  App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function publish($job)
    {
        $job->status = 1;
        $job->save();

        return redirect('/home')->with('status', 'Job post published');
    }

    /**
     * Mark as Spam
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function spam($id)
    {
        //
    }
        
}
