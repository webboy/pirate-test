<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Unpublished Jobs</div>
            <div class="panel-body">                    
                @if (\App\Job::unpublished()->count() > 0)
                    <ul>
                        @foreach (\App\Job::unpublished()->get() as $job)
                            <li>
                                <h2>{{ $job->title }} <small>{{ $job->email }}</small></h2>
                                <p>{{ $job->description }}</p>
                                <a href="{{ $job->publish_url() }}" class="btn btn-success pull-left">Publish</a>
                                <a href="{{ $job->spam_url() }}" class="btn btn-danger pull-right">Mark as Spam</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                <p class="text-danger">No unpublished jobs at the momnent.</p>
                @endif
            </div>
        </div>
    </div>
</div>