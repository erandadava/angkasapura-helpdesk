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
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">person</i>
              <p>User Profile</p>
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
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
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
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
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
              <h4 class="card-title">Create Ticket </h4>
            </div>

            <div class="card-body table-responsive">
              <form method="POST" action="/issues" class="uk-form-stacked uk-grid-large" uk-grid>
                
                <div class="uk-margin uk-form-grid-medium uk-width-1-2@s">
                  <label class="uk-form-label" for="form-stacked-select">Category</label>
                  <div class="uk-form-controls">
                  {!! Form::token() !!}
                  {!! Form::select('cat_id', $category, null, ['class' => 'uk-select', 'id'=>'form-stacked-select']) !!}
                  </div>
                </div>

                <div class="uk-form-grid-medium uk-width-1-4@s">
                  <label class="uk-form-label" for="form-stacked-select">Priority</label>
                  <div class="uk-form-controls">
                  {!! Form::hidden('request_id', Auth::id(), ['class' => 'form-control']) !!}
                  {!! Form::hidden('usr', 'a', ['class' => 'form-control']) !!}
                  {!! Form::select('prio_id', $priority, null, ['class' => 'uk-select', 'id'=>'form-stacked-select']) !!}
                  </div>
                </div>
                <div class="uk-form-grid-medium uk-width-1-4@s">
                  <label class="uk-form-label" for="form-stacked-select">Location</label>
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
                  <label class="uk-form-label" for="form-stacked-select">Location</label>
                  <div class="uk-form-controls">
                  {!! Form::text('location', null, ['class' => 'uk-input', 'id'=>'form-stacked-text']) !!}
                  
                  </div>
                </div>

                <div class="uk-margin uk-form-grid-medium uk-width-1-1">
                  <label class="uk-form-label">Problem</label>
                  {!! Form::textarea('prob_desc', null, ['class' => 'uk-textarea', 'id' => 'editor' ]) !!}
                </div>

                <div class="uk-margin">
                  <button type="submit" class="uk-button uk-button-primary">Send Ticket</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Solved Tickets</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table" style="table-layout: fixed;">
                
                <tbody>
                @forelse($ticket as $key => $dt)
                <tr>
                    <td>{{$dt->category->cat_name}}</td>
                    <td>{!! $dt->prob_desc !!}</td>
                    <td> 
                      <center><a class="uk-button uk-button-default" href="#modal-open-solution{{$key}}" uk-toggle>Open</a></center>

                       <div id="modal-open-solution{{$key}}" uk-modal>
                        <div class="uk-modal-dialog">
                          <button class="uk-modal-close-default" type="button" uk-close></button>
                        
                        <div class="uk-modal-header">
                          <h2 class="uk-modal-title">Solution</h2>
                        </div>
                        
                        <div class="uk-modal-body">
                            {!! $dt->solution_desc !!}
                        </div>
                        <div class="uk-modal-footer uk-text-right">
                          <a href="#modal-rating{{$key}}" class="uk-button uk-button-primary" uk-toggle>Done</a>
                        </div>
                      </div>
                    </div>

                    <div id="modal-rating{{$key}}" uk-modal>
                      <div class="uk-modal-dialog">
                      <div class="uk-modal-header">
                        <h2 class="uk-modal-title">Rate Me!</h2>
                      </div>
                      
                      <div class="uk-modal-body">
                      {!! Form::open(['route' => ['issues.update', $dt->id], 'method' => 'patch']) !!}
                      {!! Form::hidden('status', 'RT', ['class' => 'form-control'])!!}
                      {!! Form::hidden('usr', 'a', ['class' => 'form-control']) !!}
                         <fieldset class="rating">
                              <input type="radio" id="star5" name="rate" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                              <input type="radio" id="star4" name="rate" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                              <input type="radio" id="star3" name="rate" value="3" /><label for="star3" title="Meh">3 stars</label>
                              <input type="radio" id="star2" name="rate" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                              <input type="radio" id="star1" name="rate" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </fieldset>
                      </div>
                      
                      <div class="uk-modal-footer uk-text-right">
                          <button class="uk-button uk-button-primary" uk-toggle>Done</button>
                      </div>
                      {!! Form::close() !!}
                    </div>
                    </div>

                    </td>
                  </tr>
                @empty
                  <tr>
                    <td>No Data</td>
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
              <h4 class="card-title">Tickets History</h4>
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
                    <td>No Data</td>
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
