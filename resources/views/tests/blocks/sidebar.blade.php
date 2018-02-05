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
	        {{-- start new test action --}}
	        <li>
                <a title="{{trans('tests.actions.create.title')}}" data-toggle="modal" data-target="#test-create-modal">
                	<i class="fa fa-plus"></i>
                	<span class="nav-label">
                		{{trans('tests.actions.create.name')}}
                	</span>
                </a>
            </li>
	        {{-- end new test action --}}
	        {{-- start tests menu --}}
	        @if($tests && $tests->count() > 0)
	        @foreach($tests as $test)
	        {{--TODO controll state activeness--}}
	        <li class="{{isActivePath('/tests/'.$test->id.'?position_id='.$test->position_id.'&stage_id='.$test->stage_id)}}">
                <a href="{{route('tests.show', ['id' => $test->id, 'position_id' => $test->position_id, 'stage_id' => $test->stage_id])}}" title="{{$test->category}}">
                <span class="nav-label">
                	{{$test->category}}
                </span>
                </a>
            </li>
            @endforeach
	        @endif
	        {{-- end tests menu --}}

	        @endunless
	        {{-- end sidebar menus --}}

	    </ul>
	    {{-- end sidebar menu --}}

	</div>
	{{-- end sidebar collapse --}}

</nav>
{{-- end sidebar --}}
