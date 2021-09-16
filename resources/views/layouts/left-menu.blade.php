<li class="nav-item">
    <a href="{{ route('page.home') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-header"></li>
<li class="nav-header text-xs">MANAJEMEN PRODUK</li>

<li class="nav-item">
    <a href="{{ route('admin.products.index') }}" class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tshirt"></i>
        <p>Produk</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.product_categories.index') }}" class="nav-link {{ Request::is('admin/product_categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bars"></i>
        <p>Kategori Produk</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.colors.index') }}" class="nav-link {{ Request::is('admin/colors*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-palette"></i>
        <p>Warna Produk</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.sizes.index') }}" class="nav-link {{ Request::is('admin/sizes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-arrows-alt-h"></i>
        <p>Ukuran Produk</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.testimonies.index') }}" class="nav-link {{ Request::is('admin/testimonies*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-star"></i>
        <p>Review & Testimoni</p>
    </a>
</li>

<li class="nav-header"></li>
<li class="nav-header text-xs">PENJUALAN</li>

<li class="nav-item">
    <a href="{{ route('admin.discounts.index') }}" class="nav-link {{ Request::is('admin/discounts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-percent"></i>
        <p>Diskon</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.carts.index') }}" class="nav-link {{ Request::is('admin/carts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-shopping-cart"></i>
        <p>Keranjang</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin/orders*') ? 'active' : '' }}">
        <i class="nav-icon far fa-sticky-note"></i>
        <p>Order</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.payment_methods.index') }}" class="nav-link {{ Request::is('admin/payment_methods*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Metode Pembayaran</p>
    </a>
</li>

<li class="nav-header"></li>
<li class="nav-header text-xs">KEUANGAN</li>

<li class="nav-item">
    <a href="{{ route('admin.order_transactions.index') }}" class="nav-link {{ Request::is('admin/transactions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cash-register"></i>
        <p>Transaksi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.spendings.index') }}" class="nav-link {{ Request::is('admin/spendings*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-money-bill"></i>
        <p>Pengeluaran</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.spending_categories.index') }}" class="nav-link {{ Request::is('admin/spending_categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bars"></i>
        <p>Kategori Pengeluaran</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.spending_units.index') }}" class="nav-link {{ Request::is('admin/spending_units*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cubes"></i>
        <p>Satuan Unit</p>
    </a>
</li>

<li class="nav-header"></li>
<li class="nav-header text-xs">LAPORAN</li>

<li class="nav-item">
    <a href="{{ route('admin.laba_rugi.index') }}" class="nav-link {{ Request::is('admin/laba_rugi*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-calculator"></i>
        <p>Laba Rugi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.reports.index') }}" class="nav-link {{ Request::is('admin/reports*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-archive"></i>
        <p>Arsip Laporan</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.report_categories.index') }}" class="nav-link {{ Request::is('admin/report_categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bars"></i>
        <p>Kategori Laporan</p>
    </a>
</li>

<li class="nav-header"></li>
<li class="nav-header text-xs">POST</li>

<li class="nav-item">
    <a href="{{ route('admin.posts.index') }}" class="nav-link {{ Request::is('admin/posts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>Postingan</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.post_categories.index') }}" class="nav-link {{ Request::is('admin/post_categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bars"></i>
        <p>Kategori Postingan</p>
    </a>
</li>

<li class="nav-header"></li>
<li class="nav-header text-xs">MANAJEMEN USER</li>

<li class="nav-item">
    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-circle"></i>
        <p>User</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.user_verifications.index') }}" class="nav-link {{ Request::is('admin/user_verifications*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-check"></i>
        <p>Verifikasi Identitas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.user_shipments.index') }}" class="nav-link {{ Request::is('admin/shipments*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-truck"></i>
        <p>Alamat Pengiriman</p>
    </a>
</li>

<li class="nav-header"></li>
<li class="nav-header text-xs">ADMIN</li>

<li class="nav-item">
    <a href="{{ route('admin.activities.index') }}" class="nav-link {{ Request::is('admin/activities*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list-ul"></i>
        <p>Aktivitas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.partners.index') }}" class="nav-link {{ Request::is('admin/partners*') ? 'active' : '' }}">
        <i class="nav-icon far fa-handshake"></i>
        <p>Partner</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.files.index') }}" class="nav-link {{ Request::is('admin/files*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>File</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.statuses.index') }}" class="nav-link {{ Request::is('admin/statuses*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-check"></i>
        <p>Status</p>
    </a>
</li>

<li class="nav-item">
    <a href="/admin/routes" class="nav-link {{ Request::is('admin/routes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-paperclip"></i>
        <p>Route Explorer</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.delivery_costs.index') }}" class="nav-link {{ Request::is('admin/delivery_costs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Delivery Costs</p>
    </a>
</li>
