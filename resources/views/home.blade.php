@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Post a Job</div>

                <div class="panel-body">
                    Form goes here
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Jobs</div>
                <div class="panel-body">                    
                    @if (Auth::user()->jobs->count() > 0)
                        <ul>
                            @foreach (Auth::user()->jobs as $job)
                                <li>{{ $job->title }}</li>
                            @endforeach
                        </ul>
                    @else
                    <p class="text-danger">No jobs posted by You. Use the form above to post your first job</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
