@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Post a Job</div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'jobs']) !!}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" />
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>   
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
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
                    @if (Auth::user()->jobs()->published()->count() > 0)
                        <ul>
                            @foreach (Auth::user()->jobs()->published()->get() as $job)
                                <li>
                                    <h2>{{ $job->title }}</h2>
                                    <p>{{ $job->description }}</p>
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
</div>
@endsection
