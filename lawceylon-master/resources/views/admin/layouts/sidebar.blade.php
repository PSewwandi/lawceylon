<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <br>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        {{-- <li class="header">MAIN NAVIGATION</li> --}}
        <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i>
            <span>News</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('news.index') }}"><i class="fa fa-circle-o"></i>Publish</a></li>
                <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
                <li><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i>Tags</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Laws</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('laws.index') }}"><i class="fa fa-circle-o"></i>Publish</a></li>
                <li><a href="{{ route('lawcategory.index') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
                <li><a href="{{ route('lawtag.index') }}"><i class="fa fa-circle-o"></i>Tags</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Registered</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('lawyer.index') }}"><i class="fa fa-circle-o"></i>Lawyers</a></li>
                <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i>Users</a></li>
            </ul>
        </li>
        <li><a href="{{ route('unregister.index') }}"><i class="fa fa-circle-o"></i>Unregistered Lawyers</a></li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Messages</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('lawyerMessages.index') }}"><i class="fa fa-circle-o"></i>From Lawyers</a></li>
                <li><a href="{{ route('userMessages.index') }}"><i class="fa fa-circle-o"></i>From Users</a></li>
                <li><a href="{{ route('clientMessages.index') }}"><i class="fa fa-circle-o"></i>From Unregistered Users</a></li>
            </ul>
        </li>
        <li><a href="{{ route('gassettes.index') }}"><i class="fa fa-circle-o"></i>Gassettes</a></li>
    </section>
    <!-- /.sidebar -->
</aside>