@extends('layouts.app')
@section('content')
<div class="container">
    @if(Auth::guest())
        <div class="text-center">
            <h1>Hello, guest.</h1>
            <p>
                In this app you can create and manage tasks to track time it took
                to complete them. You must <a href="{{route('login')}}">login</a> or
                <a href="{{route('register')}}">register</a> to access those features.
            </p>
            <a href="{{route('login')}}" class="btn btn-success">{{__('auth.login')}}</a>
            <p>or</p>
            <a href="{{route('register')}}" class="btn btn-info">{{__('auth.register')}}</a>

        </div>
    @else
    <div class="text-center">
        <h1 class="">Hello, {{Auth::user()->name}}.</h1>
        <p>
            Welcome back. In this app you can track your tasks and time it took to complete each of them.
        </p>
        <a href="{{route('home')}}" class="btn btn-success mb-2">See your tasks here</a>
        <hr>
    </div>


    @endif

</div>
@endsection
