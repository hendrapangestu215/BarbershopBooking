<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 sticky-top">
    <div class="container">
        <div class="d-flex align-items-center">
            <a class="d-flex align-items-center text-dark" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="me-2">
                    <circle cx="6" cy="6" r="3"></circle>
                    <path d="M8.12 8.12 12 12"></path>
                    <path d="M20 4 8.12 15.88"></path>
                    <circle cx="6" cy="18" r="3"></circle>
                    <path d="M14.8 14.8 20 20"></path>
                </svg>
            </a>
            <a class="navbar-brand mb-0 h1 fw-bold" href="/">BarberShop</a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-2">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link {{ request()->is('services*') ? 'active' : '' }}" href="/services">Services</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link {{ request()->is('hairstyles*') ? 'active' : '' }}" href="/hairstyles">Hairstyle
                        Catalog</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link {{ request()->is('booking*') ? 'active' : '' }}" href="/booking">Book
                        Appointment</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link {{ request()->is('membership*') ? 'active' : '' }}"
                        href="/membership">Membership</a>
                </li>
            </ul>

            <div class="d-flex">
                @auth
                    <!-- User is logged in -->
                    <div class="dropdown">
                        <button class="btn btn-link text-dark dropdown-toggle text-decoration-none" type="button"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            @if (Auth::user()->usertype == 'admin')
                                <li><a class="dropdown-item" href="/admin/dashboard">Dashboard</a></li>
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Guest user -->
                    <a href="/login" class="btn btn-link text-dark text-decoration-none me-2">Sign In</a>
                    <a href="/register" class="btn btn-dark rounded-1 px-3">Sign Up</a>
                @endauth
            </div>
        </div>
</nav>
