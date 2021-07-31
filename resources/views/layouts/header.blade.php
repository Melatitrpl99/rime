<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="padding-top: 0.75rem"><i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link d-flex justify-content-between align-items-center" data-toggle="dropdown" style="padding-top: 0.75rem">
                <img src="https://gravatar.com/avatar/f751162407008c2d67b944f90c322a68?s=200&d=mp&r=x" class="user-image img-circle elevation-1 mr-2" alt="User Image" style="width: 24px; height: 24px">
                <span class="d-none d-md-inline">{{ auth()->check() ? auth()->user()->name : 'Guest'  }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @auth
                    <a href="{{ route('page.profile') }}" class="dropdown-item">
                        <i class="fas fa-user mr-1 text-success"></i>
                        <span class="dropdown-item-title">Profil</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog mr-1 text-secondary"></i>
                        <span class="dropdown-item-title">Pengaturan</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-1 text-danger"></i>
                        <span class="dropdown-item-title">Logout</span>
                    </a>
                @endauth
                @guest
                    <a href="#">Login</a>
                @endguest
            </div>
        </li>
    </ul>
</nav>
