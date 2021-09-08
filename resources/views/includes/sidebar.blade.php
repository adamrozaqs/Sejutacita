<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('dashboard')}}"><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard</a>
                    </li>
                    <li class="menu-title">User</li><!-- /.menu-title -->
                    <li class="">
                        <a href={{route('user.index')}}> <i class="menu-icon fa fa-street-view"></i>List User</a>
                    </li>
                    <li class="">
                        <a href="{{route('user.create')}}"> <i class="menu-icon fa fa-plus"></i>Create New User</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>