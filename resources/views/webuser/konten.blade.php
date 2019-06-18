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
            <a class="nav-link" href="./dashboard.html">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.html">
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
            <a class="navbar-brand" href="#pablo">Dashboard</a>
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
    		<div class=" col-md-4 col-sm-6 col-xs-12">
        	<div class="card card-stats">
          	<div class="card-header card-header-warning card-header-icon">
            	<div class="card-icon">
              	<i class="material-icons">content_copy</i>
            	</div>
            	<p class="card-category">Ticket</p>
            	<h3 class="card-title">{{$jumlah_keluhan}}
            	</h3>
          	</div>
          	<div class="card-footer">
            	<div class="stats">
              	<i class="material-icons text-danger">warning</i>
              	<a href="#pablo">Get It Done...</a>
            	</div>
          	</div>
        	</div>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
          <div class="card card-stats">
          	<div class="card-header {{ $performa>50 ? 'card-header-success' : 'card-header-danger' }} card-header-icon">
            	<div class="card-icon">
              	<i class="fa fa-tachometer"></i>
              </div>
              <p class="card-category">Performance</p>
              <h3 class="card-title">{{$performa}}%</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 1 Month
              </div>
            </div>
          </div>
				 </div>
				 
				 <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-check-square-o"></i>
                  </div>
                  <p class="card-category">Completed Task</p>
                  <h3 class="card-title">{{$jumlah_keluhan_selesai}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
        	</div>

				<div class="row">
				  <div class="col-lg-8 col-md-12">
            <div class="card">
              
              <div class="card-header card-header-primary">
                <h4 class="card-title">Your Tickets </h4>
              </div>

              <div class="card-body table-responsive">
                <table class="table">
                  <thead>
                    <th>Priority</th>
                    <th>Category</th>
                    <th>Problem</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <td><span class="uk-label uk-label-danger">High</span></td>
                      <td>System & Security</td>
                      <td>Cpu Kemasukan Oli Buzz, Processor Turbo boost up hingga 2.5 Bar</td>
                      <td>Terminal 3, Unit 1, Meja ABCD</td>
                      <td><span class="uk-label">Forwarded to IT Support</span></td>
                      <td>
                        <a id="js-modal-prompt" class="uk-button uk-button-default" href="#">Take</a>
                      </td>
                    </tr>
                  </tbody>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Tickets History</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </div>
                        </td>
                        <td>Cpu Kemasukan Oli Buzz, Processor Turbo boost up hingga 2.5 Bar</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      </div>
        
</body>

<script>
   UIkit.util.on('#js-modal-prompt', 'click', function (e) {
           e.preventDefault();
           e.target.blur();
           UIkit.modal.prompt('Solution:', 'Your Solution').then(function (solution) {
               console.log('Prompted:', solution)
           });
       });
</script>
@endsection
