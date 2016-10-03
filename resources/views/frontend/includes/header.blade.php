<div id="header" class="{!! $banner ? 'has-banner' : 'no-banner' !!}" style="background: linear-gradient( rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.25) ), url({{ asset($banner) }}) no-repeat; background-size: 140%;background-position: -30px -175px;">
	<div class="container">
		<div class="top">
			<div class="pull-left">
				<div class="link">
					<a href="{{ asset('/trip') }}">{{ trans('lang_user.header.trips') }}</a>
					<a href="{{ asset('/blog') }}" class="padding_left_10">{{ trans('lang_user.header.blog') }}</a>	
				</div>
			</div>
			@if(!Auth::check())
				<div class="pull-right">
					<div class="link">
						<a href="#" data-toggle="modal" data-target="#signin1">{{ trans('lang_user.header.sign_in') }}</a>
						<a href="{{ asset('/trip1') }}"><i class="fa fa-shopping-cart padding_left_10"></i>{{ trans('lang_user.header.cart') }}</a>
					</div>
				</div>
				<div class="modal fade" id="signin1" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">{{ trans('lang_user.header.sign_in') }}</h4>
				      </div>
				      <div class="modal-body modal_login">


				        <p>{{ trans('lang_user.header.sign_in_here') }}</p>
				        <form action="{{ url('/postLogin') }}" method="POST" id="formsignin">

				        	<div class="form-group">
				        		<input type="text" class="form-control form_padding" name="email" placeholder="Email">
				        	</div>
				        	<div class="form-group">
				        		<input type="password" class="form-control form_padding" name="password" placeholder="Password">
				        	</div>
				        	<div>
				        	<div class="pull-left">
				        		<input type="checkbox" name="remember"> {{ trans('lang_user.header.remember_me') }}
				        	</div>
				        	<div class="pull-right">
				        		<a href="#" data-toggle="modal" data-target="#resetpassword" data-dismiss="modal">{{ trans('lang_user.header.forgot_password') }}</a>
				        	</div>
				        	</div>
				        	<div class="clearfix"></div>
				        	<input type="submit" value="Sign In" class="btn btn-lg btn-success btn_login"> 
				        </form>
				        <a href="{{ url('/sendusemail') }}"><strong>{{ trans('lang_user.header.access_code') }}</strong></a>
				      </div>
				      
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
				  		<div class="modal-content">
					    <form action="{{ url('/sendEmailChangePassword') }}" method="POST">
						      <div class="modal-body modal_login">
						        <p>{{ trans('lang_user.header.email_reset') }}</p>
						        
						        	<div class="form-group">
						        		<input type="text" class="form-control form_padding" name="email" placeholder="Email">
						        	</div>
						        </div>
						      <div class="modal-footer">
						      	<div class="pull-right">
						      		<a href="#" data-toggle="modal" data-target="#signin1" class="btn btn-lg btn-danger">{{ trans('lang_user.header.back') }}</a>
						      		<input type="submit" value="Send Email" class="btn btn-success btn-lg">
						      	</div>

						      </div>
					      </form>
				      
				    </div>
				  </div>
				</div>


				
	<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">{{ trans('lang_user.header.access_code_send') }}</h4>
	      </div>
	      <div class="modal-body">
	       	<form method="POST" action="{{ url('/postRegister') }}" id="signupform">
	       		{{ csrf_field() }}
	       		@if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
	       		<div class="form-group">
	        		<input type="text" class="form-control" placeholder="Name" name="name" id="name">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" placeholder="Email" name="email" id="email">
	        	</div>
	        	<div class="form-group">
	        		<input type="password" class="form-control" placeholder="Password" name="password" id="password">
	        	</div>
	        	<div class="form-group">
	        		<input type="number" class="form-control" placeholder="Age" name="age" id="age">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" placeholder="Country of Residence" name="country" id="country">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" placeholder="Access Code" name="code" id="code">
	        	</div>
	        	<input type="submit" value="Get me access" class="btn btn-lg btn-success"> 
	       	</form>
	      </div>
	      
	    </div>
	  </div>
	</div>

				@else
					<a  class="pull-right btn btn-success btn-lg">{{ trans('lang_user.header.logout') }}</a>
					<ul class="nav-right pull-right list-inline">
						<li><a href="{{ route('booking.index') }}">{{ trans('lang_user.header.my_booking') }}</a></li>
						<li>
							<a href="#">{{ trans('lang_user.header.cart') }}<span class="badge">1</span></a>
						</li>

						<li class="dropdown">
							<a href class="dropdown-toggle" data-toggle="dropdown">
								{{Auth::user()->first_name}} {{Auth::user()->last_name}}
							</a>
							<div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInUp" role="menu">
								<ul class="dropdown-menu animated littleFadeInRight" role="menu">

					                <li>
					                    <a role="button" tabindex="0" href="">
					                        <i class="fa fa-user"></i>{{ trans('lang_user.header.profile') }}
					                    </a>
					                </li>
					                <li>
					                    <a role="button" tabindex="0">
					                        <i class="fa fa-cog"></i>{{ trans('lang_user.header.account') }}
					                    </a>
					                </li>
					                <li>
					                    <a role="button" href="{{ url('/logout') }}" tabindex="0">
					                        <i class="fa fa-circle-logout"></i>{{ trans('lang_user.header.logout') }}
					                    </a>
					                </li>

					            </ul>
							</div>
						</li>
					</ul>
				@endif
			
		</div>
		<div class="text-center webname">
			<a href="#"><img src="{{ asset('frontend/images/Group3.png') }}"></a>
			trip<span>shoes</span>
		</div>
		{!! $text_banner !!}
	</div>
</div>