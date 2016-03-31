<!-- Sidebar -->
<nav id="sidebar" class="bg-primary-darker">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-link text-primary pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>

                <a href="/admin/"><h1 class="logo"> Concurso Relax Na Medida - 4ª Edição</h1></a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content">
                <ul class="nav-main">
                     @foreach(\App\Helpers\JsonResources::readFile('adminPages') as $page)
                        <li>
                            <a href="/admin/{{ $page['url'] }}">
                                <i class="fa fa-fw {{ $page['icon'] }}"></i>
                                <span class="sidebar-mini-hide">{{ $page['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->