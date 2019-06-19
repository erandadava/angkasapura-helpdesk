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
              <p>IT - Helpdesk</p>
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
            <a class="navbar-brand" href="#pablo">IT - Helpdesk</a>
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
                  <span class="notification">2</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Yau have 1 new ticket with high priority</a>
                  <a class="dropdown-item" href="#">You have 1 new ticket</a>
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
                  <a class="dropdown-item" href="#">Log out</a>
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
              
              <form class="uk-form-stacked uk-grid-large" uk-grid>
                
                <div class="uk-margin uk-form-grid-medium uk-width-1-2@s">
                  <label class="uk-form-label" for="form-stacked-select">Category</label>
                  <div class="uk-form-controls">
                    <select class="uk-select" id="form-stacked-select">
                      <option>System & Security (Login, Antivirus, ETC)</option>
                      <option>Application</option>
                    </select>
                  </div>
                </div>

                <div class="uk-form-grid-medium uk-width-1-4@s">
                  <label class="uk-form-label" for="form-stacked-select">Priority</label>
                  <div class="uk-form-controls">
                    <select class="uk-select" id="form-stacked-select">
                      <option>Critical</option>
                      <option>High</option>
                      <option>Medium</option>
                      <option>Low</option>
                    </select>
                  </div>
                </div>

                <div class="uk-form-grid-medium uk-width-1-4@s">
                  <label class="uk-form-label" for="form-stacked-select">Location</label>
                  <div class="uk-form-controls">
                    <select class="uk-select" id="form-stacked-select">
                      <option>Terminal 3, Unit 1</option>
                      <option>Terminal 2, Unit 2</option>
                      <option>Terminal 1, Unit 3</option>
                      <option>A</option>
                    </select>
                  </div>
                </div>

                <div class="uk-margin uk-form-grid-medium uk-width-1-1">
                  <label class="uk-form-label">Problem</label>
                  <textarea class="uk-textarea" rows="5ß" placeholder="Describe Your Problem Here">
                  </textarea>
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
              <table class="table">
                
                <tbody>
                  <tr>
                    <td>System & Security (Login, Antivirus, ETC)</td>
                    <td>Turbo boost up core i5 terlalu banyak Turbo Lag</td>
                    <td> 
                      <a class="uk-button uk-button-default" href="#modal-open-solution" uk-toggle>Open</a>

                       <div id="modal-open-solution" uk-modal>
                        <div class="uk-modal-dialog">
                          <button class="uk-modal-close-default" type="button" uk-close></button>
                        
                        <div class="uk-modal-header">
                          <h2 class="uk-modal-title">Solution</h2>
                        </div>
                        
                        <div class="uk-modal-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="uk-modal-footer uk-text-right">
                          <a href="#modal-rating" class="uk-button uk-button-primary" uk-toggle>Done</a>
                        </div>
                      </div>
                    </div>

                    <div id="modal-rating" uk-modal>
                      <div class="uk-modal-dialog">
                      <div class="uk-modal-header">
                        <h2 class="uk-modal-title">Rate Me!</h2>
                      </div>
                      
                      <div class="uk-modal-body">
                        <form>
                         <fieldset class="rating">
                              <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                              <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                              <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                              <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                              <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </fieldset>
                        </form>
                      </div>
                      
                      <div class="uk-modal-footer uk-text-right">
                          <a href="#modal-rating" class="uk-button uk-button-primary" uk-toggle>Done</a>
                      </div>
                    </div>
                    </div>

                    </td>
                  </tr>
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
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </td>
                    <td>Turbo boost up core i5 terlalu banyak Turbo Lag</td>
                  </tr>
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
