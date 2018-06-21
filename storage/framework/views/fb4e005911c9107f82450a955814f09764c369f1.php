
<nav class="navbar-default navbar-static-side" role="navigation">

	
	<div class="sidebar-collapse">

		
	    <ul class="nav metismenu" id="side-menu">

	    	
	        <li class="nav-header">

	        	
	            <div class="dropdown profile-element">

	            	
	            	<?php if (! (Auth::guest())): ?>
	            	<span title="User Avatar">
	                	<img alt="image" class="img-circle" id="user-avatar"
	                	src="<?php echo e(Auth::user()->avatar()); ?>"
	                	width="48" height="48" title="User Avatar" />
	                </span>

	                

	                
	                <a data-toggle="dropdown" class="dropdown-toggle"
	                href="#">
		                <span class="clear">

		                	
		                	<span class="block m-t-xs" title="User Name">
		                		<strong class="font-bold">
		                			<span id="user-full-name"><?php echo e(Auth::user()->fullName()); ?></span> <b class="caret"></b>
		                		</strong>
		                	</span>
		                	

			            </span>
		            </a>
		            <?php endif; ?>
		            

		            
	                <ul class="dropdown-menu animated fadeInRight m-t-xs">
	                    
	                    <?php if (! (Auth::guest())): ?>
	                    <li>
		                    <a href="<?php echo e(url('/logout')); ?>"
		                        onclick="event.preventDefault();
		                                 document.getElementById('logout-form').submit();">
		                        Signout
		                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
		                        <?php echo e(csrf_field()); ?>

		                    </form>
		                    </a>
		                </li>
	                    <?php endif; ?>
	                </ul>
	                

	            </div>
	            

	        </li>
	        

	        
	        <?php if (! (Auth::guest())): ?>
	        
	        <?php if (\Entrust::hasRole(['Applicant'])) : ?>
	        
	        
	        <li class="<?php echo e(areActiveRoutes([
		        	'applications.applied',
		        	'applications.application'
				])); ?>">
                <a href="<?php echo e(route('applications.applied', ['applicant_id' => Auth::user()->id])); ?>">
                <i class="fa fa-file"></i>
                <span class="nav-label">My Applications</span>
                </a>
            </li>
	        
	        
	        <li class="<?php echo e(areActiveRoutes([
		        	'positions.open',
		        	'positions.preview'
				])); ?>">
                <a href="<?php echo e(route('positions.open', ['project_id' => Session::get('project_id')])); ?>">
                <i class="fa fa-file-o"></i>
                <span class="nav-label">Open Positions</span>
                </a>
            </li>
	        
	        
	        <li class="<?php echo e(areActiveRoutes([
		        	'users.cv'
				])); ?>">
                <a href="<?php echo e(route('users.cv', ['id' => Auth::user()->id])); ?>">
                	<i class="fa fa-address-card-o"></i>
	            	<span class="nav-label">My CV</span>
                </a>
            </li>
	        
	        
	        <?php endif; // Entrust::hasRole ?>

	        
	        <?php if (\Entrust::can([
                'view:report'
            ])) : ?>
	        <li class="<?php echo e(areActiveRoutes([
		        	'home',
					'reports.*'
				])); ?>">
	            <a href="#">
		            <i class="fa fa-line-chart"></i>
		            <span class="nav-label">Reports</span>
		            <span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level">

	                
	                <?php if (\Entrust::can([
		                'view:report'
	                ])) : ?>
	                <li class="<?php echo e(areActiveRoutes([
	                		'home'
			        	])); ?>">
	                	<a href="#">
	                		Dashboard<span class="fa arrow"></span>
	                	</a>
	                	<ul class="nav nav-third-level">
			                <?php if (\Entrust::can([
			                	'view:report',
			                ])) : ?>
			                <li class="<?php echo e(isActiveRoute('reports.dashboard')); ?>">
			                	<a href="<?php echo e(route('reports.dashboard')); ?>">
			                		<?php echo e(trans('reports.dashboard.title_short')); ?>

			                	</a>
			                </li>
			                <?php endif; // Entrust::can ?>
		                </ul>
	                </li>
	                <?php endif; // Entrust::can ?>
	                

	                
	            </ul>
	        </li>
	        <?php endif; // Entrust::can ?>
	        

	        
            <?php if (\Entrust::can([
	            'list:test',
            ])) : ?>
	        <li class="<?php echo e(areActiveRoutes([
	        	'tests.*'
	        	])); ?>">
	            <a href="<?php echo e(route('tests.index')); ?>">
	            	<i class="fa fa-balance-scale"></i>
	            	<span class="nav-label">Aptitude Tests</span>
	            </a>
	        </li>
	        <?php endif; // Entrust::can ?>
			

	        
            <?php if (\Entrust::can([
	            'list:project',
            ])) : ?>
          	<?php if (\Entrust::hasRole(['Organization'])) : ?>
	        <li class="<?php echo e(areActiveRoutes([
	        	'projects.*'
	        	])); ?>">
	            <a href="<?php echo e(route('projects.index')); ?>">
	            	<i class="fa fa-tasks"></i>
	            	<span class="nav-label">Projects</span>
	            </a>
	        </li>
          	<?php endif; // Entrust::hasRole ?>
	        <?php endif; // Entrust::can ?>
			
			
            <?php if (\Entrust::can([
	            'list:organization',
            ])) : ?>
	        <li class="<?php echo e(areActiveRoutes([
	        	'organization.*'
	        	])); ?>">
	            <a href="<?php echo e(route('organizations.index')); ?>">
	            	<i class="fa fa-building-o"></i>
	            	<span class="nav-label">Clients</span>
	            	<span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level collapse">

	                <?php if (\Entrust::can([
		                'list:organization'
	                ])) : ?>
	                <li class="<?php echo e(isActiveRoute('projects.*')); ?>">
	                	<a href="<?php echo e(route('organizations.index')); ?>">
	                		List
	                	</a>
	                </li>
	                <?php endif; // Entrust::can ?>

	            </ul>
	        </li>
	        <?php endif; // Entrust::can ?>
					
            <?php if (\Entrust::can([
	            'list:sector',
            ])) : ?>
	        <li class="<?php echo e(areActiveRoutes([
	        	'sectors.*'
	        	])); ?>">
	            <a href="#">
	            	<i class="fa fa-object-group"></i>
	            	<span class="nav-label">Sectors</span>
	            	<span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level collapse">

	                <?php if (\Entrust::can([
		                'list:sector'
	                ])) : ?>
	                <li class="<?php echo e(isActiveRoute('sectors.*')); ?>">
	                	<a href="<?php echo e(route('sectors.index')); ?>">
	                		List
	                	</a>
	                </li>
	                <?php endif; // Entrust::can ?>

	            </ul>
	        </li>
	        <?php endif; // Entrust::can ?>
	        

					
          
	        

	        
            <?php if (\Entrust::can(['list:user', 'list:role'])) : ?>
	        <li class="<?php echo e(areActiveRoutes([
	        		'users.index',
	        		'users.edit',
	        		'users.show',
	        		'roles.*'])); ?>">
	            <a href="#">
	            	<i class="fa fa-users"></i>
	            	<span class="nav-label">Users</span>
	            	<span class="fa arrow"></span>
	            </a>
	            <ul class="nav nav-second-level collapse">

	            	<?php if (\Entrust::can('list:user')) : ?>
	                <li class="<?php echo e(isActiveRoute('users.*')); ?>">
		                <a href="<?php echo e(route('users.index')); ?>">List</a>
	                </li>
	                <?php endif; // Entrust::can ?>

	                <?php if (\Entrust::can('list:role')) : ?>
	                <li class="<?php echo e(isActiveRoute('roles.*')); ?>">
		                <a href="<?php echo e(route('roles.index')); ?>">Roles</a>
	                </li>
	                <?php endif; // Entrust::can ?>

	            </ul>
	        </li>
	        <?php endif; // Entrust::can ?>
	        

	        <?php endif; ?>
	        

	    </ul>
	    

	</div>
	

</nav>

