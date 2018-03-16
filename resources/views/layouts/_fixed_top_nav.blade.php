<div class="row border-bottom">
        <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="m-l-lg" href="#">
                <img src="{{asset('images/landing/logo.png')}}" alt="Niajiri logo" style="height: 50px;top: 8px;position: absolute;">
            </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                
                
                <li class="text-white">
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                
            </ul>

        </nav>
</div>
        <!-- {{-- start include sidebar --}}
        @include('app.blocks.sidebar')
        {{-- end include sidebar --}}

        {{-- start page content --}}
        <div id="page-wrapper" class="gray-bg">

            {{-- start yield content --}}
            @yield('content')
            {{-- end yield content --}}

        </div>
        {{-- end page content --}}

        {{-- start footer --}}
        <div class="container-fluid m-t-lg">

            <div class="row">
                <div class="col-md-12">
                    <div class="footer fixed">
                        {{-- TODO add owner information i.e TTU --}}
                        <div>
                            <strong class="m-r-xs">Copyright Niajiri</strong>&copy; {{date('Y')}} Web Strategies by <a href="http://ipfsoftwares.com/" target="_blank">iPF Softwares</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- end footer --}}

    </div> -->