<aside class="navbar navbar-vertical navbar-expand-lg sticky-top" data-bs-theme="light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a wire:navigate href="{{ route('dashboard.index') }}">
                <img src="{{ asset('image/logo/brand.svg') }}" width="110" height="32" alt="Livewire"
                    class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm rounded-circle"
                        style="background-image: url(./static/avatars/000m.jpg)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>M. Jundi Al faruqi</div>
                        <div class="mt-1 small text-secondary">Super Admin</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Status</a>
                    <a href="./profile.html" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Feedback</a>
                    <div class="dropdown-divider"></div>
                    <a href="./settings.html" class="dropdown-item">Settings</a>
                    <a href="./sign-in.html" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav py-3">
                <li class="nav-item btn-animate-icon btn-animate-icon-pulse">
                    <a wire:navigate
                        class="nav-link mx-3 {{ Route::is('dashboard.index') ? 'border mx-3 rounded-4 bg-primary-subtle shadow-sm' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li>
                <div class="hr-text mb-3 mt-3">
                    <b>Main Menu</b>
                </div>
                <li class="nav-item btn-animate-icon btn-animate-icon-pulse">
                    <a wire:navigate
                        class="nav-link mx-3 {{ Route::is('user.index') ? 'border mx-3 rounded-4 bg-primary-subtle shadow-sm' : '' }}"
                        href="{{ route('user.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Manajemen User
                        </span>
                    </a>
                </li>
                {{-- Navigasi Tema --}}
                <li class="nav-item dropdown mt-auto d-none d-lg-block">
                    <a href="#" class="nav-link dropdown-toggle mx-3 border rounded-3" data-bs-toggle="dropdown"
                        role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-color-swatch"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M7 21h10a2 2 0 0 0 2 -2v-10a2 2 0 0 0 -2 -2h-4l-2 -3l-2 3h-4a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2z" />
                                <path d="M12 17l.01 0" />
                                <path d="M12 14l.01 0" />
                                <path d="M12 11l.01 0" />
                            </svg>
                        </span>
                        <span class="nav-link-title">Theme</span>
                    </a>
                    <div class="dropdown-menu mx-3 justify-content-start">
                        <a href="#" class="dropdown-item rounded-3" onclick="setTheme('light')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="12" r="4" />
                                <path d="M3 12h1" />
                                <path d="M20 12h1" />
                                <path d="M12 3v1" />
                                <path d="M12 20v1" />
                                <path d="M5.6 5.6l.7 .7" />
                                <path d="M18.4 5.6l-.7 .7" />
                                <path d="M5.6 18.4l.7 -.7" />
                                <path d="M18.4 18.4l-.7 -.7" />
                            </svg>
                            <span class="ms-2">Terang</span>
                        </a>
                        <a href="#" class="dropdown-item rounded-3" onclick="setTheme('dark')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 3c.132 0 .263 .003 .393 .008a9 9 0 1 0 9.599 9.599a9 9 0 0 1 -9.992 -9.607z" />
                            </svg>
                            <span class="ms-2">Gelap</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
