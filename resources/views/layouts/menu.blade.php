
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


