        <nav class="main-sidebar ps-menu">

            <div class="sidebar-header">
                <div class="text">AR</div>
                <div class="close-sidebar action-toggle">
                    <i class="ti-close"></i>
                </div>
            </div>
            <div class="sidebar-content">
                <ul>
                    <li class="{{request()->segment(1) == 'dashboard' ? 'active' : ''}}">
                        <a href="{{route('dashboard')}}" class="link">
                            <i class="ti-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @can('read configuration')
                    <li class="{{request()->segment(1) == 'configuration' ? 'active open' : ''}}">
                        <a href="#" class="main-menu has-dropdown">
                            <i class="ti-desktop"></i>
                            <span>Configuration</span>
                        </a>
                        <ul class="sub-menu ">
                            @can('read role')
                            <li class="{{request()->segment(1) == 'configuration' && request()->segment(2) == 'roles' ? 'active' : ''}}"><a href="{{route('roles.index')}}" class="link"><span>Roles</span></a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                </ul>
            </div>
        </nav>