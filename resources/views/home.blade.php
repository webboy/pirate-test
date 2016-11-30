@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Post a Job</div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'jobs/create']) !!}
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>   
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add Job</button>
                        </div>
                    {!! Form::close() !!}
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
