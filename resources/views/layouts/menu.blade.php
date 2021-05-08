
<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <span class="fa fa-user mr-2"></span><p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.activities.index') }}"
       class="nav-link {{ Request::is('admin/activities*') ? 'active' : '' }}">
        <p>Activities</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.events.index') }}"
       class="nav-link {{ Request::is('admin/events*') ? 'active' : '' }}">
        <p>Events</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.news.index') }}"
       class="nav-link {{ Request::is('admin/news*') ? 'active' : '' }}">
        <p>News</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.partners.index') }}"
       class="nav-link {{ Request::is('admin/partners*') ? 'active' : '' }}">
        <p>Partners</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.categories.index') }}"
       class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
        <p>Categories</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.products.index') }}"
       class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">
        <p>Products</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.discounts.index') }}"
       class="nav-link {{ Request::is('admin/discounts*') ? 'active' : '' }}">
        <p>Discounts</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.discountDetails.index') }}"
       class="nav-link {{ Request::is('admin/discountDetails*') ? 'active' : '' }}">
        <p>Discount Details</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.carts.index') }}"
       class="nav-link {{ Request::is('admin/carts*') ? 'active' : '' }}">
        <p>Carts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.cartDetails.index') }}"
       class="nav-link {{ Request::is('admin/cartDetails*') ? 'active' : '' }}">
        <p>Cart Details</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.orders.index') }}"
       class="nav-link {{ Request::is('admin/orders*') ? 'active' : '' }}">
        <p>Orders</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.orderDetails.index') }}"
       class="nav-link {{ Request::is('admin/orderDetails*') ? 'active' : '' }}">
        <p>Order Details</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.shipments.index') }}"
       class="nav-link {{ Request::is('admin/shipments*') ? 'active' : '' }}">
        <p>Shipments</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.transactions.index') }}"
       class="nav-link {{ Request::is('admin/transactions*') ? 'active' : '' }}">
        <p>Transactions</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.transactionDetails.index') }}"
       class="nav-link {{ Request::is('admin/transactionDetails*') ? 'active' : '' }}">
        <p>Transaction Details</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.reports.index') }}"
       class="nav-link {{ Request::is('admin/reports*') ? 'active' : '' }}">
        <p>Reports</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.spendings.index') }}"
       class="nav-link {{ Request::is('admin/spendings*') ? 'active' : '' }}">
        <p>Spendings</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.additionalCosts.index') }}"
       class="nav-link {{ Request::is('admin/additionalCosts*') ? 'active' : '' }}">
        <p>Additional Costs</p>
    </a>
</li>


