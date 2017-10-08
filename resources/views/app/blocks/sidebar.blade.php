{{-- start sidebar --}}
<nav class="navbar-default navbar-static-side" role="navigation">

	{{-- start sidebar collapse --}}
	<div class="sidebar-collapse">

		{{-- start sidebar menu --}}
	    <ul class="nav metismenu" id="side-menu">

	    	{{-- start sidebar header --}}
	        <li class="nav-header">

	        	{{-- start profile element --}}
	            <div class="dropdown profile-element">

	            	{{-- start user avatar --}}
	            	<span title="User Avatar">
	                	<img alt="image" class="img-circle"
	                	src="{{Auth::user()->avatar()}}"
	                	width="48" height="48" title="User Avatar" />
	                </span>
	                {{-- end user avatar --}}

	                {{-- start user profile toggle actions --}}
	                <a data-toggle="dropdown" class="dropdown-toggle"
	                href="#">
		                <span class="clear">

		                	{{-- start user full name --}}
		                	<span class="block m-t-xs" title="User Name">
		                		<strong class="font-bold">
		                			{{Auth::user()->name}} <b class="caret"></b>
		                		</strong>
		                	</span>
		                	{{-- end user full name --}}

			            </span>
		            </a>
		            {{-- end user profile toggle actions --}}

		            {{-- start profile toggle menu --}}
	                <ul class="dropdown-menu animated fadeInRight m-t-xs">
	                    <li><a href="{{route('profile')}}">Profile</a></li>
	                    <li class="divider"></li>
	                    @unless(Auth::guest())
	                    <li>
		                    <a href="{{ url('/logout') }}"
		                        onclick="event.preventDefault();
		                                 document.getElementById('logout-form').submit();">
		                        Signout
		                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
		                        {{ csrf_field() }}
		                    </form>
		                    </a>
		                </li>
	                    @endunless
	                </ul>
	                {{-- end profile toggle menu --}}

	            </div>
	            {{-- end profile element --}}

	        </li>
	        {{-- end sidebar header --}}

	        {{-- start sidebar menus --}}
	        @unless(Auth::guest())
	        {{-- TODO ensure is applicant --}}
	        {{-- start applicant menu --}}
	        {{-- start my applications --}}
	        <li class="{{areActiveRoutes([
		        	'my_applications'
				])}}">
                <a href="{{route('my_applications')}}">
                <i class="fa fa-file"></i> 
                <span class="nav-label">My Applications</span>
                </a>
            </li>
	        {{-- end my applications --}}
	        {{-- start open positions --}}
	        <li class="{{areActiveRoutes([
		        	'open_positions'
				])}}">
                <a href="{{route('open_positions')}}">
                <i class="fa fa-file-o"></i> 
                <span class="nav-label">Open Positions</span>
                </a>
            </li>
	        {{-- end open positions --}}
	        {{-- end applicant menu --}}

	        {{-- start cv management --}}
            {{-- @permission([]) --}}
	        <li class="">
	            <a href="#">
	            	<i class="fa fa-address-card-o"></i>
	            	<span class="nav-label">My CV</span>
	            	<span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level collapse">

	                {{-- @permission([]) --}}
	                <li class="">
	                	<a href="#">
	                		Basic
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="">
	                	<a href="#">
	                		Education
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="">
	                	<a href="#">
	                		Certificates
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="">
	                	<a href="#">
	                		Experiences
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="">
	                	<a href="#">
	                		Languages
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="">
	                	<a href="#">
	                		Referees
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="">
	                	<a href="#">
	                		Honors/Awards
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="">
	                	<a href="#">
	                		Projects
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	            </ul>
	        </li>
	        {{-- @endpermission --}}
	        {{-- end cv management --}}

	        {{-- start dashboard meu --}}
	        <li class="{{areActiveRoutes([
		        	'home',
					'reports.*'
				])}}">
	            <a href="#">
		            <i class="fa fa-line-chart"></i>
		            <span class="nav-label">Reports</span>
		            <span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level">

	                {{-- start dashboard reports --}}
	                @permission([
		                'view:report'
	                ])
	                <li class="{{areActiveRoutes([
	                		'home'
			        	])}}">
	                	<a href="#">
	                		Dashboard<span class="fa arrow"></span>
	                	</a>
	                	<ul class="nav nav-third-level">
			                @permission([
			                	'view:report',
			                ])
			                <li class="{{isActiveRoute('reports.dashboard')}}">
			                	<a href="{{route('reports.dashboard')}}">
			                		{{trans('reports.dashboard.title_short')}}
			                	</a>
			                </li>
			                @endpermission
		                </ul>
	                </li>
	                @endpermission
	                {{-- end dashboard reports --}}

	                {{-- TODO add more reports --}}
	            </ul>
	        </li>
	        {{-- end dashboard menu --}}

	        {{-- start project management --}}
            @permission([
	            'list:project',
            ])
	        <li class="{{areActiveRoutes([
	        	'projects.*'
	        	])}}">
	            <a href="#">
	            	<i class="fa fa-address-book-o"></i>
	            	<span class="nav-label">Projects</span>
	            	<span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level collapse">

	                @permission([
		                'list:project'
	                ])
	                <li class="{{isActiveRoute('projects.*')}}">
	                	<a href="{{route('projects.index')}}">
	                		List
	                	</a>
	                </li>
	                @endpermission

	            </ul>
	        </li>
	        @endpermission
	        {{-- end member management --}}

	        {{-- start user management --}}
            @permission(['list:user', 'list:role'])
	        <li class="{{areActiveRoutes(['users.*','roles.*'])}}">
	            <a href="#">
	            	<i class="fa fa-users"></i>
	            	<span class="nav-label">Users</span>
	            	<span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level collapse">

	            	@permission('list:user')
	                <li class="{{isActiveRoute('users.*')}}">
		                <a href="{{route('users.index')}}">List</a>
	                </li>
	                @endpermission

	                @permission('list:role')
	                <li class="{{isActiveRoute('roles.*')}}">
		                <a href="{{route('roles.index')}}">Roles</a>
	                </li>
	                @endpermission

	            </ul>
	        </li>
	        @endpermission
	        {{-- end user management --}}

	        @endunless
	        {{-- end sidebar menus --}}

	    </ul>
	    {{-- end sidebar menu --}}

	</div>
	{{-- end sidebar collapse --}}

</nav>
{{-- end sidebar --}}
