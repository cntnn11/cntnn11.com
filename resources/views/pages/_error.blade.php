@extends('admin.public._page')

@section('body')
<div class="page-error centered">
		
	<div class="error-symbol">
		<i class="fa-warning"></i>
	</div>
	
	<h2>
		Error {{ $error['num'] }}
		<small>{{ $error['msg'] }}</small>
	</h2>
	
	<p>{{ $error['tip'] }} {{ $mail or '' }}</p>
	
</div>

<div class="page-error-search centered">
	<!-- <form class="form-half" method="get" action="" enctype="application/x-www-form-urlencoded">
		<input type="text" class="form-control input-lg" placeholder="Search..." />
		
		<button type="submit" class="btn-unstyled">
			<i class="linecons-search"></i>
		</button>
	</form> -->
	
	<a href="#" class="go-back">
		<i class="fa-angle-left"></i>
		Go Back
	</a>
</div>

@stop


