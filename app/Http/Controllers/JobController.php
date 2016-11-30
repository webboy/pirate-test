<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\JobCreateRequest;

use App\Job;
use App\UserRole;
use App\User;

use Mail;

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
            //Check if SMTP is defined
            if (!empty(env('MAIL_USERNAME')))
            {
                //Send email to Manager
                Mail::send('emails.manager_new_job', ['job' => $job], function ($message) use ($user) {
                    $message->from('priarte@pirate-test.com', 'Laravel');
                    $message->to($user->email);
                });

                //Find moderator with email to notify
                $moderator = User::where('email',$job->email)->first();

                if (!empty($moderator))
                {
                    //Send to moderator
                    Mail::send('emails_.moderator_new_job', ['job' => $job], function ($message) use ($moderator) {
                        $message->from('priarte@pirate-test', 'Laravel');
                        $message->to($moderator->email);
                    });
                }
            }

            //It is a first Job posting
            $msg = 'Job posting created and waiting to be published my moderator.';
            
        } else {
            // It is not first, set status to published
            $job->status = 1;
            $msg = 'Job posting created and published.';
        }
        
        $job->user()->associate($user);
        $job->save();

        return redirect('/home')->with('status', $msg);
    }    

    /**
     * Publish the Job
     *
     * @param  App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function publish(Job $job)
    {
        $job->status = 1;
        $job->save();

        return redirect('/home')->with('status', 'Job post published');
    }

    /**
     * Mark as Spam
     *
     * @param  App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function spam(Job $job)
    {
        $job->status = 2;
        $job->save();

        return redirect('/home')->with('status', 'Job post marked as spam');
    }

    /**
     * Delete Job posting
     *
     * @param  App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {        
        $job->delete();

        return redirect('/home')->with('status', 'Job post deleted');
    }
        
}
