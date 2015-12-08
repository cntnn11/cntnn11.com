@extends('admin.public._page')

@section('body')
<body class="page-body login-page">
	<div class="login-container">
		<div class="row">
			<div class="col-sm-6">
				<!-- Errors container -->
				<div class="errors-container"></div>

				<!-- Add class "fade-in-effect" for login form effect -->
				<form action="{{ $form_action }}" method="post" role="form" id="login" class="login-form fade-in-effect">
					
					<div class="login-header">
						<a href="dashboard-1.html" class="logo">
							<img src="http://blog.cntnn11.com/wp-content/themes/Zine/images/mylogo_250_70.png" alt="" width="80" />
						</a>
						
						<p>输入正确就可以进来</p>
					</div>

					<div class="form-group">
						<label class="control-label" for="username">Email</label>
						<input type="text" class="form-control input-dark" name="email" id="email" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<label class="control-label" for="passwd">Password</label>
						<input type="password" class="form-control input-dark" name="passwd" id="passwd" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-dark  btn-block text-left"><i class="fa-lock"></i>
							Log In
						</button>
					</div>
				</form>
				@if( !empty($pwd) && is_array($pwd) )
				<input type="hidden" {{ $pwd['source'] or '' }}="{{ $pwd['encryp'] or '' }}">
				@endif
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
	setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
	$("form#login").validate({
		rules: {
			username: { required: true, mail:true},
			passwd: { required: true }
		},
		messages: {
			email: {required: '输入你的E-mail地址'},
			passwd: { required: '输入密码' }
		},
		invalidHandler: function (event, validator) {
		},
		errorPlacement: function (error, element) {
			var icon = $(element).parent('.input-icon').children('i');
			icon.removeClass('fa-check').addClass("fa-warning");  
			icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
			return false;
		},
		highlight: function (element) {
			$(element).closest('.form-group').removeClass("has-success").addClass('has-error');
		},
		unhighlight: function (element){},
		success: function (label, element) {
			var icon = $(element).parent('.input-icon').children('i');
			$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			icon.removeClass("fa-warning").addClass("fa-check");
		},
		submitHandler: function(form)
		{
			show_loading_bar(70);
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
			var form_action	= $('#login').attr('action');

			var email	= $(form).find('#email').val();
			var pwd		= $(form).find('#passwd').val();
			if( email && pwd )
			{
				$.ajax({ url: form_action, method: 'POST', dataType: 'json',
					data: { do_login: true, email: email, password: pwd, _token: _token },
					success: function(resp) {
						show_loading_bar({ delay: .5, pct: 100, finish: function(){
								if(resp.code=='200')
								{
									window.location.href = resp.data.url;
								}
								else
								{
									toastr.error(":) ERROR!", resp.msg, opts);
									$passwd.select();
								}
							}
						});
					}
				});
			}
			else
			{
				alert('请填写登录邮箱和密码！');
			}
		}
	});
	$("form#login .form-group:has(.form-control):first .form-control").focus();
});
</script>
@stop
