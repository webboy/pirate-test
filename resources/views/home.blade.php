@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    @if (Auth::user()->role_id == \App\UserRole::MANAGER)
        @include('includes.job_add')
        @include('includes.my_jobs')
    @else
        @include('includes.unpublished_jobs')
    @endif
</div>
@endsection
