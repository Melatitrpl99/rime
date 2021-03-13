
<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <span class="fa fa-user mr-2"></span><p>Users</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('categories.index') }}"
       class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <p>Categories</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('products.index') }}"
       class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <p>Products</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('events.index') }}"
       class="nav-link {{ Request::is('events*') ? 'active' : '' }}">
        <p>Events</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('activities.index') }}"
       class="nav-link {{ Request::is('activities*') ? 'active' : '' }}">
        <p>Activities</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('news.index') }}"
       class="nav-link {{ Request::is('news*') ? 'active' : '' }}">
        <p>News</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('carts.index') }}"
       class="nav-link {{ Request::is('carts*') ? 'active' : '' }}">
        <p>Carts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cartDetails.index') }}"
       class="nav-link {{ Request::is('cartDetails*') ? 'active' : '' }}">
        <p>Cart Details</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('orders.index') }}"
       class="nav-link {{ Request::is('orders*') ? 'active' : '' }}">
        <p>Orders</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('orderDetails.index') }}"
       class="nav-link {{ Request::is('orderDetails*') ? 'active' : '' }}">
        <p>Order Details</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('transactions.index') }}"
       class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}">
        <p>Transactions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('transactionDetails.index') }}"
       class="nav-link {{ Request::is('transactionDetails*') ? 'active' : '' }}">
        <p>Transaction Details</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('partners.index') }}"
       class="nav-link {{ Request::is('partners*') ? 'active' : '' }}">
        <p>Partners</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('reports.index') }}"
       class="nav-link {{ Request::is('reports*') ? 'active' : '' }}">
        <p>Reports</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('shipments.index') }}"
       class="nav-link {{ Request::is('shipments*') ? 'active' : '' }}">
        <p>Shipments</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('discounts.index') }}"
       class="nav-link {{ Request::is('discounts*') ? 'active' : '' }}">
        <p>Discounts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('discountDetails.index') }}"
       class="nav-link {{ Request::is('discountDetails*') ? 'active' : '' }}">
        <p>Discount Details</p>
    </a>
</li>


