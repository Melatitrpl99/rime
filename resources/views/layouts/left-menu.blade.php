
<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <span class="fa fa-user mr-2"></span>Users
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.activities.index') }}" class="nav-link {{ Request::is('admin/activities*') ? 'active' : '' }}">
        Activities
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.carts.index') }}" class="nav-link {{ Request::is('admin/carts*') ? 'active' : '' }}">
        Carts
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
        Categories
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.discounts.index') }}" class="nav-link {{ Request::is('admin/discounts*') ? 'active' : '' }}">
        Discounts
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.events.index') }}" class="nav-link {{ Request::is('admin/events*') ? 'active' : '' }}">
        Events
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.files.index') }}" class="nav-link {{ Request::is('admin/files*') ? 'active' : '' }}">
        Files
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.fileThumbs.index') }}" class="nav-link {{ Request::is('admin/fileThumbs*') ? 'active' : '' }}">
        File Thumbs
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin/orders*') ? 'active' : '' }}">
        Orders
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.partners.index') }}" class="nav-link {{ Request::is('admin/partners*') ? 'active' : '' }}">
        Partners
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.posts.index') }}" class="nav-link {{ Request::is('admin/posts*') ? 'active' : '' }}">
        Posts
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.postCategories.index') }}" class="nav-link {{ Request::is('admin/postCategories*') ? 'active' : '' }}">
        Post Categories
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.products.index') }}" class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">
        Products
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.productStocks.index') }}" class="nav-link {{ Request::is('admin/productStocks*') ? 'active' : '' }}">
        Product Stocks
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.reports.index') }}" class="nav-link {{ Request::is('admin/reports*') ? 'active' : '' }}">
        Reports
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.shipments.index') }}" class="nav-link {{ Request::is('admin/shipments*') ? 'active' : '' }}">
        Shipments
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.spendings.index') }}" class="nav-link {{ Request::is('admin/spendings*') ? 'active' : '' }}">
        Spendings
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.spendingDetails.index') }}" class="nav-link {{ Request::is('admin/spendingDetails*') ? 'active' : '' }}">
        Spending Details
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.statuses.index') }}" class="nav-link {{ Request::is('admin/statuses*') ? 'active' : '' }}">
        Statuses
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.transactions.index') }}" class="nav-link {{ Request::is('admin/transactions*') ? 'active' : '' }}">
        Transactions
    </a>
</li>
