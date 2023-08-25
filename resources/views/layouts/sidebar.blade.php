<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SanberCode <sup>Q&A</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @guest

    @else
        @if (Auth::user()->email === "admin@gmail.com")
            <div class="sidebar-heading">
                Categories
            </div>

            <li class="nav-item" id="sidebar-all-categories">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-fw fa-grip-lines"></i>
                    <span>All categories</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
        @endif
    @endguest
    

    <!-- Heading -->
    <div class="sidebar-heading">
        Questions
    </div>

    <!-- Nav Item - Question Menu -->
    <li class="nav-item" id="sidebar-all-questions">
        <a class="nav-link" href="/" >
            <i class="fa-solid fa-question"></i>
            <span>All Questions</span>
        </a>
    </li>
    @guest

    @else
        <li class="nav-item" id="sidebar-my-questions">
            <a class="nav-link" href="/user_question" >
                <i class="fa-solid fa-question"></i>
                <span>My Questions</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Answers
        </div>
        <!-- Nav Item - Question Menu -->
        <li class="nav-item" id="sidebar-all-questions">
            <a class="nav-link" href="{{ route('answered.by.user') }}" >
                <i class="fa-solid fa-question"></i>
                <span>My Answer</span>
            </a>
        </li>

    @endguest
    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    

</ul>