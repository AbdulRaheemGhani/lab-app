<!-- Main navbar -->
	<div class="navbar navbar-inverse">

		<div class="navbar-header">
			
			<ul class="nav navbar-nav ">

				

						
				@if(Auth::check())
						<li><a href="/laboratory/checkups">Checkup</a></li>
					@if(auth()->user()->usertype->name == 'Admin')
						<li><a href="/laboratory/doctors">Doctors</a></li>
						<li><a href="/laboratory/technitions">Technitions</a></li>
						<li><a href="/laboratory/cats">Test Categories</a></li>
						<li><a href="/laboratory/testings">Tests</a></li>
						<li><a href="/laboratory/usertypes">User Types</a></li>
						<li><a href="/laboratory/users">Users</a></li>
					
					@endif
				@endif


				@if(!Auth::check())
				
					<li class="ml-auto"><a href='/laboratory/login'>Sign in</a></li>
				
				@endif

			</ul>

		</div>


@if(Auth::check())
		
		<div class="navbar-collapse collapse" id="navbar-mobile">

			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						
						
						<span>{{ auth()->user()->name }}</span>
						
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{route('users.changePassword', auth()->user()->id)}}"><i class="fa fa-edit"> </i>Change Password</a></li>
						<li><a href="/laboratory/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
@endif
		
	</div>
	<!-- /main navbar -->