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
	        {{-- TODO list all position applications --}}
	        {{-- start position stages menu --}}
	        @if($position->stages && $position->stages->count() > 0)
	        @foreach($position->stages->sortBy('number') as $stage)
	        {{-- start stage menu --}}
	        <li class="{{areActiveURL('/applicationstages?stage_id='.$stage->id)}}">
                <a href="{{route('applicationstages.index', ['stage_id' => $stage->id])}}" title="{{$stage->name}}">
                <span class="nav-label">
                	{{$stage->name}}
                </span>
                </a>
            </li>
            @endforeach
	        {{-- end stage menu --}}
	        @endif
	        {{-- end position stages menu --}}

	        @endunless
	        {{-- end sidebar menus --}}

	    </ul>
	    {{-- end sidebar menu --}}

	</div>
	{{-- end sidebar collapse --}}

</nav>
{{-- end sidebar --}}
