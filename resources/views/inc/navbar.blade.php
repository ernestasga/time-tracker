<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">
            {{config('app.name')}}
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                @if (Auth::guest())
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('login')}}"><i class="fa fa-sign-in-alt"></i> {{__('auth.login')}}</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('register')}}"><i class="fa fa-sign-up-alt"></i> {{__('auth.register')}}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('home')}}"><i class="fa fa-home"></i>  {{__('tasks.my_tasks')}}</a>

                        <div class="dropdown-divider"></div>
                            <a type="submit" class="dropdown-item" href="javascript:void" onclick="$('#logout-form').submit()"><i class="fa fa-sign-out-alt"></i>  {{__('auth.logout')}}</a>
                        <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
