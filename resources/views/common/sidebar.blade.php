<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Basic Project</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name??Admin}}</a>
    </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->



{{--<li class="nav-header">EXAMPLES</li>--}}
<li class="nav-item">
    <a href="{{url('admin-dashboard')}}" class="nav-link">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>
            Dashboard
            <span class="badge badge-info right">2</span>
        </p>
    </a>
</li>

@if(has_group_access(['Role','Resource']))
               <li class="nav-item has-treeview {{
                (
                (Request::is('*/users') || Request::is('*/users/*') || Request::is('users') || Request::is('users/*'))
                || (Request::is('*/role') || Request::is('*/role/*') || Request::is('role') || Request::is('role/*'))
                || (Request::is('*/resource') || Request::is('*/resource/*') || Request::is('resource') || Request::is('resource/*'))
                ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{
                (
                (Request::is('*/users') || Request::is('*/users/*') || Request::is('users') || Request::is('users/*'))
                || (Request::is('*/role') || Request::is('*/role/*') || Request::is('role') || Request::is('role/*'))
                || (Request::is('*/resource') || Request::is('*/resource/*') || Request::is('resource') || Request::is('resource/*'))
                ) ? 'active' : '' }}">
                <i class="nav-icon fa fa-users"></i>
                <p>User Management<i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                @if(has_access('Alfaj\Acl\Http\RoleController@index',True))
                    <li class="nav-item">
                        <a href="/role" class="nav-link {{
                (
                (Request::is('*/role') || Request::is('*/role/*') || Request::is('role') || Request::is('role/*'))
                ) ? 'active' : '' }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                @endif
                @if(has_access('Alfaj\Acl\Http\ResourceController@index',True))
                    <li class="nav-item">
                        <a href="/resource" class="nav-link {{
                (
                (Request::is('*/resource') || Request::is('*/resource/*') || Request::is('resource') || Request::is('resource/*'))
                ) ? 'active' : '' }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Permissions</p>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Resources
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('video')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Video</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('policy-guideline')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Policy Guideline</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('user-manual')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Manuals</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('faq')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>FAQ</p>
            </a>
        </li>
    </ul>
</li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Assessment
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('assessment-category')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category</p>
                </a>
            </li>
        </ul>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('assessment-question')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Question</p>
                </a>
            </li>
        </ul>

    </li>

    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
        <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
            <i class="nav-icon fas fa-calendar-alt"></i>

            <p>Logout</p>
        </a>
        </form>
    </li>

</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
