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
		                			{{Auth::user()->fullName()}} <b class="caret"></b>
		                		</strong>
		                	</span>
		                	{{-- end user full name --}}

			            </span>
		            </a>
		            {{-- end user profile toggle actions --}}

		            {{-- start profile toggle menu --}}
	                <ul class="dropdown-menu animated fadeInRight m-t-xs">
	                    {{-- <li><a href="{{route('profile')}}">Profile</a></li>
	                    <li class="divider"></li> --}}
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
	        @role(['Applicant'])
	        {{-- start applicant menu --}}
	        {{-- start my applications --}}
	        <li class="{{areActiveRoutes([
		        	'applications.applied',
		        	'applications.application'
				])}}">
                <a href="{{route('applications.applied', ['applicant_id' => Auth::user()->id])}}">
                <i class="fa fa-file"></i>
                <span class="nav-label">My Applications</span>
                </a>
            </li>
	        {{-- end my applications --}}
	        {{-- start open positions --}}
	        <li class="{{areActiveRoutes([
		        	'positions.open',
		        	'positions.preview'
				])}}">
                <a href="{{route('positions.open', ['project_id' => Session::get('project_id')])}}">
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
	        	'users.resume',
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
	                	<a href="{{route('users.basic')}}" title="{{trans('cvs.headers.basic.title')}}">
	                		{{trans('cvs.headers.basic.name')}}
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('educations.*')}}">
	                	<a href="{{route('educations.index', ['applicant_id' => Auth::user()->id, 'project_id' => Session::get('project_id')])}}" title="{{trans('cvs.headers.educations.title')}}">
	                		{{trans('cvs.headers.educations.name')}}
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('certificates.*')}}">
	                	<a href="{{route('certificates.index', ['applicant_id' => Auth::user()->id, 'project_id' => Session::get('project_id')])}}" title="{{trans('cvs.headers.certificates.title')}}">
	                		{{trans('cvs.headers.certificates.name')}}
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('experiences.*')}}">
	                	<a href="{{route('experiences.index', ['applicant_id' => Auth::user()->id, 'project_id' => Session::get('project_id')])}}" title="{{trans('cvs.headers.experiences.title')}}">
	                		{{trans('cvs.headers.experiences.name')}}
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('languages.*')}}">
	                	<a href="{{route('languages.index', ['applicant_id' => Auth::user()->id, 'project_id' => Session::get('project_id')])}}" title="{{trans('cvs.headers.languages.title')}}">
	                		{{trans('cvs.headers.languages.name')}}
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('referees.*')}}">
	                	<a href="{{route('referees.index', ['applicant_id' => Auth::user()->id, 'project_id' => Session::get('project_id')])}}" title="{{trans('cvs.headers.referees.title')}}">
	                		{{trans('cvs.headers.referees.name')}}
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('achievements.*')}}">
	                	<a href="{{route('achievements.index', ['applicant_id' => Auth::user()->id, 'project_id' => Session::get('project_id')])}}" title="{{trans('cvs.headers.achievements.title')}}">
	                		{{trans('cvs.headers.achievements.name')}}
	                	</a>
	                </li>
	                {{-- @endpermission --}}


	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('publications.*')}}">
	                	<a href="{{route('publications.index', ['applicant_id' => Auth::user()->id, 'project_id' => Session::get('project_id')])}}" title="{{trans('cvs.headers.publications.title')}}">
	                		{{trans('cvs.headers.publications.name')}}
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	                {{-- @permission([]) --}}
	                <li class="{{isActiveRoute('users.resume')}}">
	                	<a href="{{route('users.resume', ['id' => Auth::user()->id])}}" title="{{trans('cvs.headers.generate.title')}}">
	                		{{trans('cvs.headers.generate.name')}}
	                	</a>
	                </li>
	                {{-- @endpermission --}}

	            </ul>
	        </li>
	        {{-- @endpermission --}}
	        {{-- end cv management --}}
	        @endrole

	        {{-- start dashboard meu --}}
	        @permission([
                'view:report'
            ])
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
	        @endpermission
	        {{-- end dashboard menu --}}

	        {{-- start project management --}}
            @permission([
	            'list:project',
            ])
          @role(['Organization'])
	        <li class="{{areActiveRoutes([
	        	'projects.*'
	        	])}}">
	            <a href="#">
	            	<i class="fa fa-tasks"></i>
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
          @endrole
	        @endpermission
					{{-- start organization management --}}
            @permission([
	            'list:organization',
            ])
	        <li class="{{areActiveRoutes([
	        	'organization.*'
	        	])}}">
	            <a href="#">
	            	<i class="fa fa-building-o"></i>
	            	<span class="nav-label">Clients</span>
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
	            	<i class="fa fa-object-group"></i>
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
	        <li class="{{areActiveRoutes([
	        		'users.index',
	        		'users.edit',
	        		'users.show',
	        		'roles.*'])}}">
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
