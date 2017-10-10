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
		        	'applications.applied',
		        	'positions.preview'
				])}}">
                <a href="{{route('applications.applied')}}">
                <i class="fa fa-file"></i> 
                <span class="nav-label">My Applications</span>
                </a>
            </li>
	        {{-- end my applications --}}
	        {{-- start open positions --}}
	        <li class="{{areActiveRoutes([
		        	'positions.open'
				])}}">
                <a href="{{route('positions.open')}}">
                <i class="fa fa-file-o"></i> 
                <span class="nav-label">Open Positions</span>
                </a>
            </li>
	        {{-- end open positions --}}
	        {{-- end applicant menu --}}

	        {{-- start cv management --}}
            {{-- @permission([]) --}}
	        <li class="{{areActiveRoutes([
	        	'users.basic',
	        	'educations.*',
	        	'certificates.*',
	        	'experiences.*',
	        	'languages.*',
	        	'referees.*',
	        	'achievements.*',
	        	'assignments.*',
	        	'publications.*'
	        	])}}">
	            <a href="#">
	            	<i class="fa fa-address-card-o"></i>
	            	<span class="nav-label">My CV</span>
	            	<span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level collapse">

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('users.basic')}}">
	                	<a href="{{route('users.basic')}}">
	                		Basic
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('educations.*')}}">
	                	<a href="{{route('educations.index', ['applicant_id' => Auth::user()->id])}}">
	                		Education
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('certificates.*')}}">
	                	<a href="{{route('certificates.index', ['applicant_id' => Auth::user()->id])}}">
	                		Certificates
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('experiences.*')}}">
	                	<a href="{{route('experiences.index', ['applicant_id' => Auth::user()->id])}}">
	                		Experiences
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('languages.*')}}">
	                	<a href="{{route('languages.index', ['applicant_id' => Auth::user()->id])}}">
	                		Languages
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('referees.*')}}">
	                	<a href="{{route('referees.index', ['applicant_id' => Auth::user()->id])}}">
	                		Referees
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('achievements.*')}}">
	                	<a href="{{route('achievements.index', ['applicant_id' => Auth::user()->id])}}">
	                		Honors/Awards
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('assignments.*')}}">
	                	<a href="{{route('assignments.index', ['applicant_id' => Auth::user()->id])}}">
	                		Projects
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('publications.*')}}">
	                	<a href="{{route('publications.index', ['applicant_id' => Auth::user()->id])}}">
	                		Publications
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="">
	                	<a href="#">
	                		Generate
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
					{{-- start organization management --}}
            @permission([
	            'list:organization',
            ])
	        <li class="{{areActiveRoutes([
	        	'organization.*'
	        	])}}">
	            <a href="#">
	            	<i class="fa fa-address-book-o"></i>
	            	<span class="nav-label">Organizations</span>
	            	<span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level collapse">

	                @permission([
		                'list:organization'
	                ])
	                <li class="{{isActiveRoute('projects.*')}}">
	                	<a href="{{route('organizations.index')}}">
	                		List
	                	</a>
	                </li>
	                @endpermission

	            </ul>
	        </li>
	        @endpermission
					{{-- start sector management --}}
            @permission([
	            'list:sector',
            ])
	        <li class="{{areActiveRoutes([
	        	'sectors.*'
	        	])}}">
	            <a href="#">
	            	<i class="fa fa-address-book-o"></i>
	            	<span class="nav-label">Sectors</span>
	            	<span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level collapse">

	                @permission([
		                'list:sector'
	                ])
	                <li class="{{isActiveRoute('sectors.*')}}">
	                	<a href="{{route('sectors.index')}}">
	                		List
	                	</a>
	                </li>
	                @endpermission

	            </ul>
	        </li>
	        @endpermission
	        {{-- end sector management --}}

					{{-- start positions management --}}
            @permission([
	            'list:position',
            ])
	        <li class="{{areActiveRoutes([
	        	'positions.index',
	        	'positions.edit',
	        	'positions.show',
	        	])}}">
	            <a href="#">
	            	<i class="fa fa-address-book-o"></i>
	            	<span class="nav-label">Position</span>
	            	<span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level collapse">

	                @permission([
		                'list:position'
	                ])
	                <li class="{{isActiveRoute('positions.*')}}">
	                	<a href="{{route('positions.index')}}">
	                		List
	                	</a>
	                </li>
	                @endpermission

	            </ul>
	        </li>
	        @endpermission
	        {{-- end positions management --}}

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
