
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-user"></i><span>categories</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-user"></i><span>products</span></a>
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


