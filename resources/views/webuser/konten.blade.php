@extends('webuser.index')

@section('content')
  <header class="uk-navbar-container" uk-sticky="media: 960">
  <nav class="uk-navbar-container uk-margin-bottom-remove" uk-navbar>
  	<div class="uk-navbar-left uk-padding-small uk-margin-medium-left">
  		<img src="{{asset('img/logo-ap2.jpeg')}}" style="width: 15%;">
			<span class="uk-margin-medium-left uk-hidden@m" uk-icon="icon: menu"></span>
  	</div>

  	<div class="uk-navbar-right uk-margin-medium-right">
  		<span class="uk-margin-medium-right" uk-icon="icon: search"></span>
  		<span class="uk-margin-medium-right uk-badge" uk-icon="icon: bell">100</span>
  		<span class="uk-margin-medium-right" uk-icon="icon: more-vertical"></span>
  	</div>
  </nav>
</header>
  <nav class="sidebar uk-background-secondary uk-light uk-padding">Hi</nav>
@endsection
