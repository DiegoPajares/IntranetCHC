<div class="inner-wrapper">
    <!-- start: sidebar -->
    <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
            <div class="sidebar-title">
                Navigation
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <div class="nano">
            <div class="nano-content">
                <nav id="menu" class="nav-main" role="navigation">

                    <ul class="nav nav-main">
                        <li  class="<?php echo (($actualP == 'Dashboard') ? 'nav-active' : ''); ?>">
                            <a class="nav-link" href="<?php echo MAIN_URL ?>/dashboard">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Dashboard</span>
                            </a>                        
                        </li>
                        <li class="nav-parent <?php echo (($actualP == 'Por_Cobrar') ? 'nav-expanded nav-active' : ''); ?>">
                            <a class="nav-link" href="#">
                                <i class="fa fa-columns" aria-hidden="true"></i>
                                <span>Por Cobrar</span>
                            </a>
                            <ul class="nav nav-children">
                                <li class="<?php echo (($actualH == 'Amortizaciones') ? 'nav-active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo MAIN_URL ?>/xcobrar/amortizaciones">
                                        Amortizaciones
                                    </a>
                                </li>
                                <li class="<?php echo (($actualH == 'ControlPagos') ? 'nav-active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo MAIN_URL ?>/">
                                        Control de Pagos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-parent <?php echo (($actualP == 'Mantenedor') ? 'nav-expanded nav-active' : ''); ?>">
                            <a class="nav-link" href="#">
                                <i class="fa fa-columns" aria-hidden="true"></i>
                                <span>Mantenedor</span>
                            </a>
                            <ul class="nav nav-children">
                                <li class="<?php echo (($actualH == 'Proyectos/Obras') ? 'nav-active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo MAIN_URL ?>/Mantenedores/Obras">
                                        Proyectos/Obras
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <hr class="separator" />

                <div class="sidebar-widget widget-tasks">
                    <div class="widget-header">
                        <h6>Projects</h6>
                        <div class="widget-toggle">+</div>
                    </div>
                    <div class="widget-content">
                        <ul class="list-unstyled m-0">
                            <li><a href="#">Porto HTML5 Template</a></li>
                            <li><a href="#">Tucson Template</a></li>
                            <li><a href="#">Porto Admin</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <script>
                // Maintain Scroll Position
                if (typeof localStorage !== 'undefined') {
                    if (localStorage.getItem('sidebar-left-position') !== null) {
                        var initialPosition = localStorage.getItem('sidebar-left-position'),
                                sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                        sidebarLeft.scrollTop = initialPosition;
                    }
                }
            </script>


        </div>

    </aside>
    <!-- end: sidebar -->