<nav class="navbar navbar-default">
<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
		aria-expanded="false">
			<span class="sr-only">Atoz navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{url('/')}}">Atoz</a>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
		@if(Auth::check())
			@if(!empty($page) && $page=='prepaid_balance')
				<li class="active"><a href="{{url('prepaid_balance')}}">Prepaid Balance</a></li>
				<span class="sr-only">(current)</span></a></li>
			@else
				<li><a href="{{url('prepaid_balance')}}">Prepaid Balance</a></li>
			@endif
			
			@if(!empty($page) && $page=='product')
				<li class="active"><a href="{{url('/product')}}">Product</a></li>
				<span class="sr-only">(current)</span></a></li>
			@else
				<li><a href="{{url('product')}}">Product</a></li>
			@endif
			
			@if(!empty($page) && $page=='order')
				<li class="active"><a href="{{url('/order')}}">Order</a></li>
				<span class="sr-only">(current)</span></a></li>
			@else
				<li><a href="{{url('order')}}">Order</a></li>
			@endif
		@endif
		</ul>
		<ul class="nav navbar-nav navbar-right">
			@if(Auth::check())
				<li><a href="{{ url('logout') }}" title="Click here to Log Out">{{ Auth::user()->name }}</a></li>
			@else
			<li><a href="{{ url('login') }}">Login</a></li>
			@endif
			<li class="dropdown"></li>
		</u>
	</div>
</div>
</nav>
	






