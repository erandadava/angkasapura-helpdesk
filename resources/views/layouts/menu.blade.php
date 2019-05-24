
<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{!! route('dashboard.index') !!}"><i class="fa fa-edit"></i><span>Dashboard</span>
    </a>
</li>

@role('user')
<li class="treeview menu-open">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{!! route('users.index') !!}"><i class="fa fa-circle-o"></i> Data User</a></li>
            <li><a href="{!! route('issues.index') !!}"><i class="fa fa-circle-o"></i> Ticketing</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> History Ticket</a></li>
          </ul>
</li>
@endrole

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
    <a href="{!! route('issues.index') !!}"><i class="fa fa-edit"></i><span>Keluhan</span></a>
</li>

@hasrole('IT Administrator')
<li class="treeview menu-open">
          <a href="#">
            <i class="fa fa-edit"></i> <span>IT Administrator</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Keluhan</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Preventive</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Inventaris</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
          </ul>
</li>
@endrole

@role('IT Support')
<li class="treeview menu-open">
          <a href="#">
            <i class="fa fa-edit"></i> <span>IT Support</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Keluhan</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Preventive</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Penilaian</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
          </ul>
</li>
@endrole

@role('IT Operasional')
<li class="treeview menu-open">
          <a href="#">
            <i class="fa fa-edit"></i> <span>IT Operasional</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Keluhan</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Preventive</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Inventaris</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
          </ul>
</li>
@endrole

@role('IT Non Public')
<li class="treeview menu-open">
          <a href="#">
            <i class="fa fa-edit"></i> <span>IT Non Public</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Keluhan</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Preventive</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Inventaris</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
          </ul>
</li>
@endrole