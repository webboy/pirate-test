<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">My Published Jobs</div>
            <div class="panel-body">                    
                @if (Auth::user()->jobs()->published()->count() > 0)
                    <ul>
                        @foreach (Auth::user()->jobs()->published()->get() as $job)
                            <li>
                                <h2>{{ $job->title }}</h2>
                                <p>{{ $job->description }}</p>
                                {!! Form::open(['url' => 'jobs/'.$job->id,'method' => 'DELETE']) !!}  
                                <button type="submit" class="btn btn-danger">Delete Job</button>                                  
                                {!! Form::close() !!}
                            </li>
                        @endforeach
                    </ul>
                @else
                <p class="text-danger">No jobs posted by You. Use the form above to post your first job</p>
                @endif
            </div>
        </div>
    </div>
</div>