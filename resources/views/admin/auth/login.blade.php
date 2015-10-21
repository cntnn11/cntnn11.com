@extends('admin.public._page')

@section('body')


<body class="page-body login-page">
	<div class="login-container">
		<div class="row">
			<div class="col-sm-6">
				<!-- Errors container -->
				<div class="errors-container"></div>

				<!-- Add class "fade-in-effect" for login form effect -->
				<form method="post" role="form" id="login" class="login-form fade-in-effect">
					
					<div class="login-header">
						<a href="dashboard-1.html" class="logo">
							<img src="http://blog.cntnn11.com/wp-content/themes/Zine/images/mylogo_250_70.png" alt="" width="80" />
						</a>
						
						<p>输入正确就可以进来</p>
					</div>
	
					
					<div class="form-group">
						<label class="control-label" for="username">Username</label>
						<input type="text" class="form-control input-dark" name="username" id="username" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<label class="control-label" for="passwd">Password</label>
						<input type="password" class="form-control input-dark" name="passwd" id="passwd" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-dark  btn-block text-left">
							<i class="fa-lock"></i>
							Log In
						</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</body>
@stop

@section('footer_include_js')
<script type="text/javascript" src="{{ ADMINCDN('assets/js/jquery-validate/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ ADMINCDN('assets/js/toastr/toastr.min.js') }}"></script>
@stop
@section('footer_custom_js')
<script type="text/javascript">
jQuery(document).ready(function($)
{
	// Reveal Login form
	setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
	// Validation and Ajax action
	$("form#login").validate({
		rules: {
			username: {
				required: true
			},
			
			passwd: {
				required: true
			}
		},
		
		messages: {
			username: {
				required: 'Please enter your username.'
			},
			
			passwd: {
				required: 'Please enter your password.'
			}
		},
		
		// Form Processing via AJAX
		submitHandler: function(form)
		{
			show_loading_bar(70); // Fill progress bar to 70% (just a given value)
			var opts = {
				"closeButton": true,
				"debug": false,
				"positionClass": "toast-top-full-width",
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};
				
			$.ajax({
				url: "data/login-check.php",
				method: 'POST',
				dataType: 'json',
				data: {
					do_login: true,
					username: $(form).find('#username').val(),
					passwd: $(form).find('#passwd').val(),
				},
				success: function(resp)
				{
					show_loading_bar(
					{
						delay: .5,
						pct: 100,
						finish: function(){
							
							// Redirect after successful login page (when progress bar reaches 100%)
							if(resp.accessGranted)
							{
								window.location.href = 'dashboard-1.html';
							}
							else
							{
								toastr.error("You have entered wrong password, please try again. User and password is <strong>demo/demo</strong> :)", "Invalid Login!", opts);
								$passwd.select();
							}
						}
					});
					
				}
			});
			
		}
	});
	
	// Set Form focus
	$("form#login .form-group:has(.form-control):first .form-control").focus();
});
</script>
@stop
