{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <nav class="navbar bg-success">
            <div class="container">
                <a class="navbar-brand" href="/home">
                    <img src="{{ asset('/images/SIBANKSAM-logo.svg') }}" alt="Logo" 
                    width="30" height="auto" class="d-inline-block align-text-top bg-success">
                    SIBANKSAM
                </a>
            </div>
        </nav>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'input' ? 'active' : '' }}" href="/input">Input</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link {{ $active === 'history' ? 'active' : '' }}" href="/input">Riwayat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/About">About</a>
                </li> --}}
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            
                            @can('admin')
                            <li><a class="dropdown-item" href="dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @endcan

                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link {{ $active === 'register' ? 'active' : '' }}">
                            Sign Up
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav> {{-- >>> Navbar End --}}
