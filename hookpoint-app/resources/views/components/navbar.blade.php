<header class="main-header">
    <div class="logo-section">
        <img src="{{ asset('images/logo.png') }}" alt="Logo HookPoint">
        <p>HookPoint - Club Pemancingan</p>
    </div>

    <div class="menu-toggle" onclick="toggleMenu()">☰</div>

    <nav class="navbar" id="navbarMenu">
        <ul>
            <li>
                <a href="/landing-page" class="{{ request()->is('landing-page') ? 'active' : '' }}">
                    Beranda
                </a>
            </li>

            <li>
                <a href="/lapak" class="{{ request()->is('lapak') ? 'active' : '' }}">
                    Lapak
                </a>
            </li>

            @if(session('user'))
                <li>
                    <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li><a href="/logout">Logout</a></li>
            @else
                <li>
                    <a href="/login" class="{{ request()->is('login') ? 'active' : '' }}">
                        Login
                    </a>
                </li>

                <li>
                    <a href="/register" class="{{ request()->is('register') ? 'active' : '' }}">
                        Register
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</header>
