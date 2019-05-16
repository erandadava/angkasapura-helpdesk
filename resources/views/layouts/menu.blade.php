
<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{!! route('dashboard.index') !!}"><i class="fa fa-edit"></i><span>Dashboard</span>
    </a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }} ">
    <a href="#"><i class="fa fa-edit"></i><span>Users</span>
<!-- <span class="pull-right-corner">
    <i class="fa fa-angel-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
    <li>
        <a href="{!! route('users.index') !!}"><i class="fa fa-circle"></i><span>data user</span>

    </li>
    <li>
        <a href="#"><i class="fa fa-circle"></i><span>Ticketing</span></a>
    </li>
</ul></a> -->
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Kategori</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('priorities*') ? 'active' : '' }}">
    <a href="{!! route('priorities.index') !!}"><i class="fa fa-edit"></i><span>Prioritas</span></a>
</li>

<!-- <li class="{{ Request::is('ratings*') ? 'active' : '' }}">
    <a href="{!! route('ratings.index') !!}"><i class="fa fa-edit"></i><span>Ratings</span></a>
</li> -->

<li class="{{ Request::is('issues*') ? 'active' : '' }}">
    <a href="{!! route('issues.index') !!}"><i class="fa fa-edit"></i><span>Keluhan</span>
</li>
