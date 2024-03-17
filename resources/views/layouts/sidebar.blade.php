<!-- Sidebar -->
<aside id="sidebar" class="u-sidebar">
    <div class="u-sidebar-inner">
        <!-- Sidebar Header -->
        <header class="u-sidebar-header">
            <!-- Sidebar Logo -->
            <a class="u-sidebar-logo" href="index.html">
                <img class="u-sidebar-logo__icon" src="assets/svg/logo-mini.svg" alt="Awesome Icon">
                <img class="u-sidebar-logo__text" src="assets/svg/logo-text-light.svg" alt="Awesome">
            </a>
            <!-- End Sidebar Logo -->
        </header>
        <!-- End Sidebar Header -->

        <!-- Sidebar Nav -->
        <nav class="u-sidebar-nav">
            <!-- Sidebar Nav Menu -->
            <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                <!-- Dashboard -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link {{ (request()->is('home*')) ? 'active' : '' }}" href="{{ route('home')}}">
                        <span class="ti-dashboard u-sidebar-nav-menu__item-icon"></span>
                        <span class="u-sidebar-nav-menu__item-title">Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard -->

                @if (Auth::user()->hasRole(['admin', 'staff']))
                 <!-- Complaint -->
                 <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link {{ (request()->is('complaints*')) ? 'active' : '' }}" href="{{ route('complaints.index') }}">
                        <span class="ti-pencil-alt u-sidebar-nav-menu__item-icon"></span>
                        <span class="u-sidebar-nav-menu__item-title">Keluhan</span>
                    </a>
                </li>
                <!-- End Complaint -->

                <!-- UI Base -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link  {{ (request()->is('patient*')) ? 'active' : '' }}" href="#"
                       data-target="#menuItemUIBase">
                        <span class="ti-paint-roller u-sidebar-nav-menu__item-icon"></span>
                        <span class="u-sidebar-nav-menu__item-title">Pasien</span>
                        <span class="ti-angle-down u-sidebar-nav-menu__item-arrow"></span>
                    </a>

                    <ul id="menuItemUIBase" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        <!-- Colors -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="{{ route('patientnewPatient') }}">
                                <span class="u-sidebar-nav-menu__item-icon">B</span>
                                <span class="u-sidebar-nav-menu__item-title">Pasien Baru</span>
                            </a>
                        </li>
                        <!-- End Colors -->

                        <!-- Typography -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="{{ route('patientallPatient') }}">
                                <span class="u-sidebar-nav-menu__item-icon">L</span>
                                <span class="u-sidebar-nav-menu__item-title">Pasien Lama</span>
                            </a>
                        </li>
                        <!-- End Typography -->
                    </ul>
                </li>
                <!-- End UI Base -->

                <!-- UI Components -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link  {{ (request()->is('users*')) ? 'active' : '' }}" href="#"
                       data-target="#menuItemUIComponents">
                        <span class="ti-panel u-sidebar-nav-menu__item-icon"></span>
                        <span class="u-sidebar-nav-menu__item-title">Tenaga Medis</span>
                        <span class="ti-angle-down u-sidebar-nav-menu__item-arrow"></span>
                    </a>

                    <ul id="menuItemUIComponents" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        <!-- Alerts -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="#">
                                <span class="u-sidebar-nav-menu__item-icon">A</span>
                                <span class="u-sidebar-nav-menu__item-title">Apoteker</span>
                            </a>
                        </li>
                        <!-- End Alerts -->

                        <!-- Buttons -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="#">
                                <span class="u-sidebar-nav-menu__item-icon">A</span>
                                <span class="u-sidebar-nav-menu__item-title">Anestesi</span>
                            </a>
                        </li>
                        <!-- End Buttons -->

                        <!-- Cards -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="#">
                                <span class="u-sidebar-nav-menu__item-icon">D</span>
                                <span class="u-sidebar-nav-menu__item-title">Dokter</span>
                            </a>
                        </li>
                        <!-- End Cards -->

                        <!-- Modals -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="{{ route('users.index')}}">
                                <span class="u-sidebar-nav-menu__item-icon">R</span>
                                <span class="u-sidebar-nav-menu__item-title">Rekam Medis</span>
                            </a>
                        </li>
                        <!-- End Modals -->

                        <!-- Other -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="#">
                                <span class="u-sidebar-nav-menu__item-icon">U</span>
                                <span class="u-sidebar-nav-menu__item-title">Umum</span>
                            </a>
                        </li>
                        <!-- End Other -->
                    </ul>
                </li>
                <!-- End UI Components -->

                <!-- Poli -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link {{ (request()->is('polies*')) ? 'active' : '' }}" href="{{ route('polies.index') }}">
                        <span class="ti-pencil-alt u-sidebar-nav-menu__item-icon"></span>
                        <span class="u-sidebar-nav-menu__item-title">Poli</span>
                    </a>
                </li>
                <!-- End Poli -->
                @else
                <!-- Complaint -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link {{ (request()->is('complaints*')) ? 'active' : '' }}" href="{{ route('complaints.index') }}">
                        <span class="ti-pencil-alt u-sidebar-nav-menu__item-icon"></span>
                        <span class="u-sidebar-nav-menu__item-title">Keluhan Saya</span>
                    </a>
                </li>
                <!-- End Complaint --> 
                @endif
            </ul>
            <!-- End Sidebar Nav Menu -->
        </nav>
        <!-- End Sidebar Nav -->
    </div>
</aside>
<!-- End Sidebar -->