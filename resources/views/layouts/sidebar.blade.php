<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('logo.png') }}" alt="Rime Syari Logo" class="brand-image">
        <span class="brand-text font-weight-light">Rime Syari</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://gravatar.com/avatar/f751162407008c2d67b944f90c322a68?s=200&d=mp&r=x" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.left-menu')
            </ul>
        </nav>
    </div>
</aside>
