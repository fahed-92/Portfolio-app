@if (Auth::guard('admin')->check())
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-code"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Portfolio Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Portfolio Content
        </div>

        <!-- Nav Item - About Section -->
        <li class="nav-item {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.about.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>About</span>
            </a>
        </li>

        <!-- Nav Item - Resume Section -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResume"
                aria-expanded="true" aria-controls="collapseResume">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Resume</span>
            </a>
            <div id="collapseResume" class="collapse {{ request()->routeIs('admin.education.*') || request()->routeIs('admin.experience.*') ? 'show' : '' }}"
                aria-labelledby="headingResume" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Resume Components:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.education.*') ? 'active' : '' }}"
                        href="{{ route('admin.education.index') }}">Education</a>
                    <a class="collapse-item {{ request()->routeIs('admin.experience.*') ? 'active' : '' }}"
                        href="{{ route('admin.experience.index') }}">Experience</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Portfolio Section -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePortfolio"
                aria-expanded="true" aria-controls="collapsePortfolio">
                <i class="fas fa-fw fa-briefcase"></i>
                <span>Portfolio</span>
            </a>
            <div id="collapsePortfolio" class="collapse {{ request()->routeIs('admin.project.*') || request()->routeIs('admin.service.*') ? 'show' : '' }}"
                aria-labelledby="headingPortfolio" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Portfolio Components:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.project.*') ? 'active' : '' }}"
                        href="{{ route('admin.project.index') }}">Projects</a>
                    <a class="collapse-item {{ request()->routeIs('admin.service.*') ? 'active' : '' }}"
                        href="{{ route('admin.service.index') }}">Services</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Skills Section -->
        <li class="nav-item {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.category.index') }}">
                <i class="fas fa-fw fa-tools"></i>
                <span>Skills & Categories</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Management
        </div>

        <!-- Nav Item - Settings -->
        <li class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.settings.index') }}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Settings</span>
            </a>
        </li>

        <!-- Nav Item - Visitors -->
        <li class="nav-item {{ request()->routeIs('admin.visitors.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.visitors.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Visitors</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
@endif
