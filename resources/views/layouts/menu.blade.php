<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{!! route('dashboard.index') !!}"><i class="fa fa-edit"></i><span>Dashboard</span>
    </a>
</li>

@role('Admin')
<li class="">
    <a href="/admin/metrics"><i class="fa fa-edit"></i><span>Pemantauan</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Kategori</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Tugas</span></a>
</li>

<li class="{{ Request::is('priorities*') ? 'active' : '' }}">
    <a href="{!! route('priorities.index') !!}"><i class="fa fa-edit"></i><span>Prioritas</span></a>
</li>


<!-- <li class="{{ Request::is('ratings*') ? 'active' : '' }}">
    <a href="{!! route('ratings.index') !!}"><i class="fa fa-edit"></i><span>Ratings</span></a>
</li> -->

<li class="{{ Request::is('issues*') ? 'active' : '' }}">
    <a href="{!! route('issues.index') !!}"><i class="fa fa-edit"></i><span>Tiket</span></a>
</li>
<li class="{{ Request::is('inventories*') ? 'active' : '' }}">
  <a href="{!! route('inventories.index') !!}"><i class="fa fa-edit"></i>Inventaris</a>
</li>
<li class="{{ Request::is('catInventories*') ? 'active' : '' }}">
    <a href="{!! route('catInventories.index') !!}"><i class="fa fa-edit"></i><span>Kategori Inventaris</span></a>
</li>

<li class="{{ Request::is('invenPembelians*') ? 'active' : '' }}">
    <a href="{!! route('invenPembelians.index') !!}"><i class="fa fa-edit"></i><span>Pembelian Inventaris</span></a>
</li>

<li class="{{ Request::is('laporans*') ? 'active' : '' }}">
    <a href="{!! route('laporans.index') !!}"><i class="fa fa-edit"></i><span>Laporan Bulanan</span></a>
</li>

<li class="{{ Request::is('laporans*') ? 'active' : '' }}">
  <a href="{!! route('laporans.index.hari') !!}"><i class="fa fa-edit"></i><span>Laporan harian</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Pengguna</span></a>
</li>

<li class="{{ Request::is('unitKerjas*') ? 'active' : '' }}">
    <a href="{!! route('unitKerjas.index') !!}"><i class="fa fa-edit"></i><span>Unit Kerja</span></a>
</li>
@endrole
@role('User')
<li class="treeview menu-open">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/beranda"><i class="fa fa-circle-o"></i> Beranda</a></li>
            <li><a href="{!! route('users.index') !!}"><i class="fa fa-circle-o"></i> Data Pengguna</a></li>
            <li><a href="{!! route('issues.index') !!}"><i class="fa fa-circle-o"></i> Tiket</a></li>
            <li class=""><a href="{{url('/history')}}"><i class="fa fa-circle-o"></i>Riwayat Tiket</a></li>
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
            <li><a href="{!! route('issues.index') !!}"><i class="fa fa-circle-o"></i> Tiket</a></li>
            <li class="{{ Request::is('pemeriksaanPerangkats*') ? 'active' : '' }}">
                <a href="{!! route('pemeriksaanPerangkats.index') !!}"><i class="fa fa-circle-o"></i><span>Pemeriksaan Perangkat</span></a>
            </li>
            <li class="{{ Request::is('inventories*') ? 'active' : '' }}"><a href="{!! route('inventories.index') !!}"><i class="fa fa-circle-o"></i>Inventaris</a></li>
            <li class=""><a href="/issues?p=a"><i class="fa fa-circle-o"></i> Penilaian</a></li>
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
            <li><a href="{!! route('issues.index') !!}"><i class="fa fa-circle-o"></i> Tiket</a></li>
            <li class="{{ Request::is('pemeriksaanPerangkats*') ? 'active' : '' }}">
                <a href="{!! route('pemeriksaanPerangkats.index') !!}"><i class="fa fa-circle-o"></i><span>Pemeriksaan Perangkat</span></a>
            </li>
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
            <li><a href="{!! route('issues.index') !!}"><i class="fa fa-circle-o"></i> Tiket</a></li>
            <li class="{{ Request::is('pemeriksaanPerangkats*') ? 'active' : '' }}">
                <a href="{!! route('pemeriksaanPerangkats.index') !!}"><i class="fa fa-circle-o"></i><span>Pemeriksaan Perangkat</span></a>
            </li>
            <li class="{{ Request::is('inventories*') ? 'active' : '' }}"><a href="{!! route('inventories.index') !!}"><i class="fa fa-circle-o"></i> Inventaris</a></li>
            <li class=""><a href="{!! route('laporans.index.hari') !!}"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
            <li class=""><a href="{!! route('laporans.index') !!}"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
            <li class=""><a href="/inventories?n=a"><i class="fa fa-circle-o"></i> Laporan Inventaris</a></li>
            <li class=""><a href="/issues?p=a"><i class="fa fa-circle-o"></i> Penilaian</a></li>
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
            <li><a href="{!! route('issues.index') !!}"><i class="fa fa-circle-o"></i> Tiket</a></li>
            <li class="{{ Request::is('pemeriksaanPerangkats*') ? 'active' : '' }}">
                <a href="{!! route('pemeriksaanPerangkats.index') !!}"><i class="fa fa-circle-o"></i><span>Pemeriksaan Perangkat</span></a>
            </li>
            <li class="{{ (Request::is('inventories*') && !isset($_GET['n'])) ? 'active' : '' }}"><a href="{!! route('inventories.index') !!}"><i class="fa fa-circle-o"></i> Inventaris</a></li>
            <li class=""><a href="{!! route('laporans.index.hari') !!}"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
            <li class=""><a href="{!! route('laporans.index') !!}"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
            <li class="{{ isset($_GET['n']) ? 'active' : '' }}"><a href="/inventories?n=a"><i class="fa fa-circle-o"></i> Laporan Inventaris</a></li>
            <li class="{{ Request::is('invenPembelians*') ? 'active' : '' }}">
                <a href="{!! route('invenPembelians.index') !!}"><i class="fa fa-circle-o"></i><span>Pembelian Inventaris</span></a>
            </li>

            <li class="{{ Request::is('categories*') ? 'active' : '' }}"><a href="{!! route('categories.index') !!}"><i class="fa fa-circle-o"></i><span>Kategori</span></a></li>

            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                <a href="{!! route('roles.index') !!}"><i class="fa fa-circle-o"></i><span>Tugas</span></a>
            </li>

            <li class="{{ Request::is('priorities*') ? 'active' : '' }}">
                <a href="{!! route('priorities.index') !!}"><i class="fa fa-circle-o"></i><span>Prioritas</span></a>
            </li>

            <li class="{{ (Request::is('users*') && !isset($_GET['np'])) ? 'active' : '' }}">
                <a href="{!! route('users.index') !!}"><i class="fa fa-circle-o"></i><span>Pengguna</span></a>
            </li>

            <li class="{{ (Request::is('users*') && isset($_GET['np'])) ? 'active' : '' }}">
              <a href="/users?np=1"><i class="fa fa-circle-o"></i><span>Penilaian</span></a>
            </li>


          </ul>
</li>
@endrole
