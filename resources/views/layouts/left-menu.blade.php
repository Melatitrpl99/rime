{{--
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../../index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../../index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../../index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
            </a>
        </li>
    </ul>
</li>
--}}

<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bars"></i>
        <p>
            Kategori Produk
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.products.index') }}" class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tshirt"></i>
        <p>
            Produk
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.colors.index') }}" class="nav-link {{ Request::is('colors*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-palette"></i>
        <p>
            Warna Produk
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.sizes.index') }}" class="nav-link {{ Request::is('sizes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-arrows-alt-h"></i>
        <p>
            Ukuran Produk
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.dimensions.index') }}" class="nav-link {{ Request::is('dimensions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-ruler-combined"></i>
        <p>
            Dimensi Produk
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.product_stocks.index') }}" class="nav-link {{ Request::is('product_stocks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cubes"></i>
        <p>
            Stok Produk
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.discounts.index') }}" class="nav-link {{ Request::is('discounts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-percent"></i>
        <p>
            Diskon
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.carts.index') }}" class="nav-link {{ Request::is('carts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-shopping-cart"></i>
        <p>
            Keranjang
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.statuses.index') }}" class="nav-link {{ Request::is('statuses*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-check"></i>
        <p>
            Status
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('orders*') ? 'active' : '' }}">
        <i class="nav-icon far fa-sticky-note"></i>
        <p>
            Order
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.shipments.index') }}" class="nav-link {{ Request::is('shipments*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-truck"></i>
        <p>
            Pengiriman
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.transactions.index') }}" class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cash-register"></i>
        <p>
            Transaksi
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.activities.index') }}" class="nav-link {{ Request::is('activities*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list-ul"></i>
        <p>
            Aktivitas
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.files.index') }}" class="nav-link {{ Request::is('files*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>
            File
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.partners.index') }}" class="nav-link {{ Request::is('partners*') ? 'active' : '' }}">
        <i class="nav-icon far fa-handshake"></i>
        <p>
            Partner
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.post_categories.index') }}" class="nav-link {{ Request::is('post_categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bars"></i>
        <p>
            Kategori Postingan
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.posts.index') }}" class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>
            Postingan
        </p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.reports.index') }}" class="nav-link {{ Request::is('reports*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-invoice"></i>
        <p>
            Laporan
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.spendings.index') }}" class="nav-link {{ Request::is('spendings*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-money-bill"></i>
        <p>
            Pengeluaran
        </p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.laba_rugi.index') }}" class="nav-link {{ Request::is('laba_rugi*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-invoice"></i>
        <p>
            Laba Rugi
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>
            User
        </p>
    </a>
</li>
