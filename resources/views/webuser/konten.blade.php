@extends('webuser.index')

@section('content')
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white">

      <div class="logo">
			<img src="{{asset('img/logo-ap2.jpeg')}}" style="width: 100%;">
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="/beranda">
              <i class="material-icons">dashboard</i>
              <p>IT - Helpdesk</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

		<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="/beranda">IT - Helpdesk</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  @if($count_notif>0) <span class="notification">{{$count_notif}}</span>@endif
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  @foreach($data_notif as $dt)
                  <a class="dropdown-item" href="{{$dt->link_id}}">
                    {!! $dt->pesan !!}
                  </a>
                  @endforeach
                  @if($count_notif==0)
                    <a class="dropdown-item" href="#">
                      Tidak Ada Notifikasi
                    </a>
                  @endif
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Akun
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <!-- <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a> -->
                  <!-- <div class="dropdown-divider"></div> -->
                  <a href="{!! url('/logout') !!}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

	<div class="content">
		<div class="container-fluid">
    	<div class="row">
				<div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Buat Tiket </h4>
            </div>

            <div class="card-body table-responsive">
              <form method="POST" action="/issues" class="uk-form-stacked uk-grid-large" uk-grid>

                <div class="uk-margin uk-form-grid-medium uk-width-1-2@s">
                  <label class="uk-form-label" for="form-stacked-select">Kategori</label>
                  <div class="uk-form-controls">
                  {!! Form::token() !!}
                  {!! Form::select('cat_id', $category, null, ['class' => 'uk-select', 'id'=>'form-stacked-select']) !!}
                  </div>
                </div>

                <div class="uk-form-grid-medium uk-width-1-4@s">
                  <label class="uk-form-label" for="form-stacked-select">Prioritas</label>
                  <div class="uk-form-controls">
                  {!! Form::hidden('request_id', Auth::id(), ['class' => 'form-control']) !!}
                  {!! Form::hidden('usr', 'a', ['class' => 'form-control']) !!}
                  {!! Form::select('prio_id', $priority, null, ['class' => 'uk-select', 'id'=>'form-stacked-select']) !!}
                  </div>
                </div>
                <div class="uk-form-grid-medium uk-width-1-4@s">
                  <label class="uk-form-label" for="form-stacked-select">Serial Number/ID Perangkat</label>
                  <div class="uk-form-controls">
                  <select class='uk-select' id='form-stacked-select' name="dev_ser_num">
                      @foreach($sernum as $key => $val)
                      <optgroup label="{{$val->nama_cat}}">
                          @foreach($val->inventory as $dt)
                              <option value="{{$dt->id}}">{{$dt->sernumid}}</option>
                          @endforeach
                      </optgroup>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="uk-margin uk-form-grid-medium uk-width-1-2">
                  <label class="uk-form-label" for="form-stacked-select">Lokasi</label>
                  <div class="uk-form-controls">
                  {!! Form::text('location', null, ['class' => 'uk-input', 'id'=>'form-stacked-text']) !!}

                  </div>
                </div>
                <div class="uk-margin uk-form-grid-medium uk-width-1-4@s">
                  <label class="uk-form-label" for="form-stacked-select">Unit Kerja</label>
                  <div class="uk-form-controls">
                  {!!  \Auth::user()->unit_kerja->nama_uk ?? ''!!}
                  {!! Form::hidden('id_unit_kerja', \Auth::user()->id_unit_kerja, ['class' => 'uk-input', 'id'=>'form-stacked-text']) !!}

                  </div>
                </div>
                <div class="uk-margin uk-form-grid-medium uk-width-1-4@s">
                  <label class="uk-form-label" for="form-stacked-select">Perangkat Lain</label>
                  <div class="uk-form-controls">
                  {!! Form::text('other_device', null, ['class' => 'uk-input', 'id'=>'form-stacked-text']) !!}

                  </div>
                </div>
                <div class="uk-margin uk-form-grid-medium uk-width-1-2">
                    <label class="uk-form-label" for="form-stacked-select">Nomor Telepon</label>
                    <div class="uk-form-controls">
                    {!! Form::text('no_tlp', null, ['class' => 'uk-input', 'id'=>'form-stacked-text', 'pattern' => '\d*']) !!}

                    </div>
                  </div>
                <div class="uk-margin uk-form-grid-medium uk-width-1-1">
                  <label class="uk-form-label">Keluhan</label>
                  {!! Form::textarea('prob_desc', null, ['class' => 'uk-textarea', 'id' => 'editor' ]) !!}
                </div>

                <div class="uk-margin">
                  <button type="submit" class="uk-button uk-button-primary">Kirim Tiket</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
      <div class="col-lg-8 col-md-12">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">Tiket Yang Tersedia</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table" style="table-layout: fixed;">

                <tbody>
                @forelse($open_ticket as $key => $dt)
                <tr>
                    <td>{{$dt->category->cat_name}}</td>
                    <td style="padding-top: 30px;">{!! $dt->prob_desc !!}</td>
                    <td>
                    @if ($dt->status == null) <span class='badge badge-primary label label-default'>Menunggu IT Administrator</span> @endif
                    @if ($dt->status == 'RITADM') <span class='badge badge-danger'>Ditolak & Menunggu Alasan Dari IT Administrator</span> @endif
                    @if ($dt->status == 'AITADM') <span class='badge badge-success'>Diterima IT Administrator</span> @endif
                    @if ($dt->status == 'ITSP') <span class='badge badge-info'>Diteruskan ke IT Support</span> @endif
                    @if ($dt->status == 'RITSP') <span class='badge badge-danger'>Keluhan Tidak Dapat Diatasi Oleh IT Support & Menunggu Konfirmasi Dari IT Administrator</span> @endif
                    @if ($dt->status == 'AITSP') <span class='badge badge-warning'>Menunggu Solusi Dari IT Support</span> @endif
                    @if ($dt->status == 'ITOPS') <span class='badge badge-warning'>Menunggu Solusi Dari IT OPS</span> @endif
                    @if ($dt->status == 'CLOSE') <span class='badge badge-success'>Keluhan Ditutup</span> @endif
                    @if ($dt->status == 'SLITADM') <span class='badge badge-success'>Solusi Telah Diberikan IT Administrator</span> @endif
                    @if ($dt->status == 'SLITOPS') <span class='badge badge-success'>Solusi Telah Diberikan IT OPS</span> @endif
                    @if ($dt->status == 'SLITSP') <span class='badge badge-success'>Solusi Telah Diberikan IT Support</span> @endif
                    @if ($dt->status == 'LITOPS') <span class='badge badge-info'>IT OPS Menuju ke Lokasi</span> @endif
                    @if ($dt->status == 'LITSP') <span class='badge badge-info'>IT Support Menuju ke Lokasi</span> @endif
                    @if ($dt->status == 'DLITOPS') <span class='badge badge-warning'>Sedang Dalam Tindakan IT OPS</span> @endif
                    @if ($dt->status == 'DLITSP') <span class='badge badge-warning'>Sedang Dalam Tindakan IT Support</span> @endif
                    @if ($dt->status == 'RT') <span class='badge badge-warning'>User Telah Memberi Rating</span> @endif
                  </td>

                  </tr>
                @empty
                  <tr>
                    <td>Tidak Ada Data</td>
                  </tr>
                @endforelse
                </tbody>

              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Tiket Yang Telah Ditangani</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table" style="table-layout: fixed;">

                <tbody>
                @forelse($ticket as $key => $dt)
                <tr>
                    <td>{{$dt->category->cat_name}}</td>
                    <td style="padding-top: 30px;">{!! $dt->prob_desc !!}</td>
                    <td>
                      <center><a class="uk-button uk-button-default" href="#modal-open-solution{{$key}}" uk-toggle>Buka</a></center>

                       <div id="modal-open-solution{{$key}}" uk-modal>
                        <div class="uk-modal-dialog">
                          <button class="uk-modal-close-default" type="button" uk-close></button>

                        <div class="uk-modal-header">
                          <h2 class="uk-modal-title">Solusi</h2>
                        </div>

                        <div class="uk-modal-body">
                            {!! $dt->solution_desc !!}
                        </div>
                        <div class="uk-modal-footer uk-text-right">
                            @if(($dt->status == 'SLITSP' || $dt->status == 'SLITOPS' && $dt->assign_it_support != null && $dt->complete_by == $dt->assign_it_support)||($dt->status == 'SLITSP' || $dt->status == 'SLITOPS' && $dt->assign_it_ops != null && $dt->complete_by == $dt->assign_it_ops))
                            <a href="#modal-rating{{$key}}" class="uk-button uk-button-danger" uk-toggle>Penilaian</a>
                            @endif                   
                        </div>
                      </div>
                    </div>

                    <div id="modal-rating{{$key}}" uk-modal>
                      <div class="uk-modal-dialog">
                      <div class="uk-modal-header">
                        <h2 class="uk-modal-title">Penilaian</h2>
                      </div>

                      <div class="uk-modal-body">
                          {!! Form::open(['route' => ['issues.update', $dt->id], 'method' => 'patch']) !!}
                          {!! Form::hidden('usr', 'd', ['class' => 'form-control']) !!}
                          {!! Form::hidden('status', 'CLOSE', ['class' => 'form-control'])!!}
                          {!! Form::hidden('rate', null, ['class' => 'ratingnya'.$dt->id]) !!}
                      <div id="rate{{$dt->id}}"></div>
                      <script>
                        $("#rate{{$dt->id}}").rateYo({
                          rating: 0,
                          fullStar: true,
                          onChange: function (rating, rateYoInstance) {
                            $('.ratingnya{{$dt->id}}').val(rating);
                          }
                        });
                      </script>
                      </div>

                      <div class="uk-modal-footer uk-text-right">
                          <button class='uk-button uk-button-primary' type="submit" onclick="return confirm('Yakin?')">
                              <i class="glyphicon glyphicon-check"></i> Selesai
                            </button>
                        {!! Form::close() !!}
                      </div>
                    </div>
                    </div>

                    </td>
                  </tr>
                @empty
                  <tr>
                    <td>Tidak Ada Data</td>
                  </tr>
                @endforelse
                </tbody>

              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-12">
          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title">Histori Tiket</h4>
            </div>

            <div class="card-body">
              <table class="table" style="table-layout: fixed;">
                <tbody>
                 @forelse($ticket_done as $key => $dt)
                  <tr>
                    <td width="10%">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="" disabled='disabled' checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </td>
                    <td>{!! $dt->prob_desc !!}</td>
                  </tr>
                @empty
                  <tr>
                    <td>Tidak Ada Data</td>
                  </tr>
                @endforelse
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>

    </div>
  </div>
</body>

@endsection
