<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                  <span><img alt="image" class="img-circle img-responsive square-80" src="/images/avatar.jpg"/></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">Example user</strong>
                            </span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="{{ isActiveRoute('dashboard') }}">
                <a href="{{ url('home/dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Admin Dashboard</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                   <li class="{{ isActiveRoute('organizations.index') }}"><a href="{{ url('home/dashboard/organizations') }}">Organization</a></li>
                   <li class="{{ isActiveRoute('projects.index') }}"><a href="{{ url('home/dashboard/projects') }}">Projects</a></li>
                   <li class="{{ isActiveRoute('positions.index') }}"><a href="{{ url('home/dashboard/positions') }}">Positions</a></li>
                   <li class="{{ isActiveRoute('sectors.index') }}"><a href="{{ url('home/dashboard/sectors') }}">Sectors</a></li>
                </ul>
            </li>
            <li class="{{ isActiveRoute('home/portal') }}">
                <a href="{{ url('home/portal') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Organization Portal</span> </a>
            </li>
        </ul>

    </div>
</nav>
