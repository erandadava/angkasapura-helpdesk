<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{!! route('dashboard.index') !!}"><i class="fa fa-edit"></i><span>Dashboard</span>
    </a>
</li>

@role('Admin')
<li class="">
    <a href="/admin/metrics"><i class="fa fa-edit"></i><span>Monitoring</span></a>
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
    <a href="{!! route('issues.index') !!}"><i class="fa fa-edit"></i><span>Ticket</span></a>
</li>
<li class="{{ Request::is('catInventories*') ? 'active' : '' }}">
    <a href="{!! route('catInventories.index') !!}"><i class="fa fa-edit"></i><span>Kategori Inventaris</span></a>
</li>

<li class="{{ Request::is('laporans*') ? 'active' : '' }}">
    <a href="{!! route('laporans.index') !!}"><i class="fa fa-edit"></i><span>Laporan Bulan</span></a>
</li>

<li class="{{ Request::is('laporans*') ? 'active' : '' }}">
  <a href="{!! route('laporans.index.hari') !!}"><i class="fa fa-edit"></i><span>Laporan hari</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>User</span></a>
</li>
@endrole
@role('User')
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
            <li class=""><a href="{{url('/history')}}"><i class="fa fa-circle-o"></i> History Ticket</a></li>
          </ul>
</li>
@endrole

@role('IT Administrator')
<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>IT Administrator</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{!! route('issues.index') !!}"><i class="fa fa-circle-o"></i> Ticket</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Preventive</a></li>
            <li class="{{ Request::is('inventories*') ? 'active' : '' }}"><a href="{!! route('inventories.index') !!}"><i class="fa fa-circle-o"></i> Inventaris</a></li>
            <li class=""><a href="{!! route('laporans.index.hari') !!}"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
            <li class=""><a href="{!! route('laporans.index') !!}"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
            <li class=""><a href="/inventories?n=a"><i class="fa fa-circle-o"></i> Laporan Inventaris</a></li>
          </ul>
</li>
@endrole

@role('IT Support')
<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>IT Support</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{!! route('issues.index') !!}"><i class="fa fa-circle-o"></i> Ticket</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Preventive</a></li>
            <li class=""><a href="/issues?p=a"><i class="fa fa-circle-o"></i> Penilaian</a></li>
            <li class=""><a href="{!! route('laporans.index.hari') !!}"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
            <li class=""><a href="/inventories?n=a"><i class="fa fa-circle-o"></i> Laporan Inventaris</a></li>
          </ul>
</li>
@endrole

@role('IT Operasional')
<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>IT Operasional</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{!! route('issues.index') !!}"><i class="fa fa-circle-o"></i> Ticket</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Preventive</a></li>
            <li class="{{ Request::is('inventories*') ? 'active' : '' }}"><a href="{!! route('inventories.index') !!}"><i class="fa fa-circle-o"></i> Inventaris</a></li>
            <li class=""><a href="{!! route('laporans.index.hari') !!}"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
            <li class=""><a href="{!! route('laporans.index') !!}"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
            <li class=""><a href="/inventories?n=a"><i class="fa fa-circle-o"></i> Laporan Inventaris</a></li>
          </ul>
</li>
@endrole

@role('IT Non Public')
<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>IT Non Public</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{!! route('issues.index') !!}"><i class="fa fa-circle-o"></i> Ticket</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Preventive</a></li>
            <li class="{{ (Request::is('inventories*') && !isset($_GET['n'])) ? 'active' : '' }}"><a href="{!! route('inventories.index') !!}"><i class="fa fa-circle-o"></i> Inventaris</a></li>
            <li class=""><a href="{!! route('laporans.index.hari') !!}"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
            <li class=""><a href="{!! route('laporans.index') !!}"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
            <li class="{{ isset($_GET['n']) ? 'active' : '' }}"><a href="/inventories?n=a"><i class="fa fa-circle-o"></i> Laporan Inventaris</a></li>
          </ul>
</li>
@endrole