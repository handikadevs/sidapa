<style>
    #profileImage {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #777777;
  font-size: 30px;
  color: #fff;
  text-align: center;
  line-height: 50px;
  margin: 2px 0;
}
</style>

<!-- Header (Topbar) -->
<header class="u-header">
    <!-- Header Left Section -->
    <div class="u-header-left">
        <!-- Header Logo -->
        <a class="u-header-logo" href="{{ route('index') }}">
            <span class="u-header-logo__icon" alt="Icon">SPP</span>
            <span class="u-header-logo__text" alt="Text">Si Dapa</span>
        </a>
        <!-- End Header Logo -->
    </div>
    <!-- End Header Left Section -->

    <!-- Header Middle Section -->
    <div class="u-header-middle">
        <!-- Sidebar Invoker -->
        <div class="u-header-section">
            <a class="js-sidebar-invoker u-header-invoker u-sidebar-invoker" href="#"
               data-is-close-all-except-this="true"
               data-target="#sidebar">
                <span class="ti-align-left u-header-invoker__icon u-sidebar-invoker__icon--open"></span>
                <span class="ti-align-justify u-header-invoker__icon u-sidebar-invoker__icon--close"></span>
            </a>
        </div>
        <!-- End Sidebar Invoker -->

        <!-- Header Search -->
        <div class="u-header-section justify-content-center flex-grow-1 py-0">
            <div class="u-header-search"
                    data-search-mobile-invoker="#headerSearchMobileInvoker"
                    data-search-target="#headerSearch">
                    <span class="h3 text-dark d-none d-md-inline-flex align-items-center">Sistem Pendaftaran Pasien</span>
            </div>
        </div>
        <!-- End Header Search -->

        <!-- User Profile -->
        <div class="u-header-section u-header-section--profile">
            <div class="u-header-dropdown dropdown">
                <a class="link-muted d-flex align-items-center" href="#" role="button" id="userProfileInvoker" aria-haspopup="true" aria-expanded="false"
                   data-toggle="dropdown"
                   data-offset="0">
                    <div id="profileImage" class="u-header-avatar rounded-circle mr-md-3" alt="User Profile"></div>
                    <span id="username" class="text-dark d-none d-md-inline-flex align-items-center">
                        {{ Auth::user()->name }}
                        <span class="ti-angle-down text-muted ml-4"></span>
                    </span>
                </a>

                <div class="u-header-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="userProfileInvoker" style="width: 260px;">
                    <div class="card p-3">
                         <div class="card-body p-0">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3">
                                    @if (Auth::user()->hasRole('patient'))
                                        <a class="link-dark" href="{{ route('patientdetailPatient', Auth::user()->id) }}">View Profile</a>  
                                    @else
                                        <a class="link-dark" href="#">View Profile</a>  
                                    @endif
                                </li>
                                <li>
                                    <a class="link-dark" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Keluar') }}</a>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End User Profile -->
    </div>
    <!-- End Header Middle Section -->
</header>
<!-- End Header (Topbar) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var username = $('#username').text();
        var initial = username.split(' ').map(name => name[0]).join('').toUpperCase();
        var profileImage = $('#profileImage').text(initial);
      });

    console.log(name)
</script>