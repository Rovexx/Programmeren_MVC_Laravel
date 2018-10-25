<nav>
    <div class="nav-wrapper amber">
        <a href="/" class="brand-logo left">{{ config('app.name', 'Laravel') }}</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <li><a href="/occasions">Occasionoverzicht</a></li>
            <li><a href="/route">Routebeschrijving</a></li>
            <li><a href="/contact">Contact</a></li>
            <!-- as admin you can see the add car button -->
            @if(!Auth::guest())
                @if(Auth::user()->id == 1)
                <li><a href="/occasions/create">Auto toevoegen</a></li>
                @endif
            @endif
        </ul>
        <ul class="right hide-on-med-and-down">
            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            @else
                <li><a class="dropdown-trigger" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                <!-- Dropdown Log out -->
                <ul id="dropdown1" class="dropdown-content">
                    <a class="amber" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            @endguest
        </ul>
    </div>
</nav>