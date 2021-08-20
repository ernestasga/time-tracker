@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div id="taskRemovedAlert">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="text-center">Your tasks</h3>
                    <p>
                        You have <b id="taskCount">{{$total_tasks}}</b> tasks.
                    </p>
                    @include('inc.new_task_modal')
                    <hr>
                    @include('inc.report')
                    <hr>
                    @include('inc.tasks')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
