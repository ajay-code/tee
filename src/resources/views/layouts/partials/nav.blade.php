<nav class="navbar navbar-default navbar-fixed-top navbar--green">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand navbar-brand__image__container flex-center" href="{{ url('/') }}">
                <img class="navbar-brand__image" src="{{ getStorageUrl('avatar/ball.png') }}" alt="">
            </a>
            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="navbar-brand__name">
                    {{ config('app.name', 'Laravel') }}
                </span>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li>
                        <a href=" {{ route('messages') }} ">Messages @include('message.unread-count')</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Notifications
                                <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @each('layouts.partials.notification',auth()->user()->notifications, 'notification')                           
                                
                        </ul>

                    </li>
                    <li>
                        <a href=" {{ route('user.find.friends') }} ">Find Friends</a>
                    </li>
                
                
                    <li class="dropdown">
                        <img class="user__avatar" src="{{ Auth::user()->thumbnail() }}" alt="">
                        <a href="#" class="user__name" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username ? Auth::user()->username : Auth::user()->firstname }}
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('user.profile') }}">
                                    <i class="fa fa-user-circle"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.find.friends') }}">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                Find Friends
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.friendrequest') }}">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                Friend Requests
                                <span class="badge">{{ auth()->user()->getFriendRequests()->count() }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="fixed-header-margin">
</div>
