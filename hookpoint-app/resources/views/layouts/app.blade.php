<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HookPoint</title>

    @yield('styles')
</head>

<body>

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

    <main>
        @yield('content')
    </main>

   <footer class="main-footer">
        <div class="footer-container">

            <div class="footer-column">
                <h3>HookPoint</h3>
                <p>Platform reservasi lapak pemancingan yang memudahkan pemancing untuk memesan tempat secara online.</p>
            </div>

            <div class="footer-column">
                <h3>Menu</h3>
                <p><a href="index-css.html">Beranda</a></p>
                <p><a href="lapak.html">Lapak</a></p>
                <p><a href="masuk.html">Masuk</a></p>
                <p><a href="daftar.html">Daftar</a></p>
            </div>

            <div class="footer-column">
                <h3>Kontak</h3>
                <p>Email: hookpoint@email.com</p>
                <p>Telepon: 08123456789</p>
                <p>Alamat: Kota Pemancingan</p>
            </div>

        </div>

            <p class="footer-copy">&copy; 2026 HookPoint - Club Pemancingan</p>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById("navbarMenu").classList.toggle("active");
        }

        const elements = document.querySelectorAll('.fade-up');

        function checkScroll() {
            const triggerBottom = window.innerHeight * 0.85;

            elements.forEach(el => {
                const boxTop = el.getBoundingClientRect().top;

                if (boxTop < triggerBottom) {
                    el.classList.add('show');
                }else {
                    el.classList.remove('show');
                }
            });
        }

        window.addEventListener('scroll', checkScroll);
        checkScroll();
    </script>

    @yield('scripts')

</body>
</html>
