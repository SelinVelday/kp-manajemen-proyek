<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Manajemen Proyek KP</title>
  
  <link href="{{ asset('template/assets/css/pace.min.css') }}" rel="stylesheet"/>
  <script src="{{ asset('template/assets/js/pace.min.js') }}"></script>
  <link rel="icon" href="{{ asset('template/assets/images/favicon.ico') }}" type="image/x-icon">
  <link href="{{ asset('template/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
  <link href="{{ asset('template/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('template/assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('template/assets/css/sidebar-menu.css') }}" rel="stylesheet"/>
  <link href="{{ asset('template/assets/css/app-style.css') }}" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<div id="wrapper">
 
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="{{ route('dashboard') }}">
       <img src="{{ asset('template/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Manajemen Proyek</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">NAVIGASI UTAMA</li>
      
      <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dasbor</span>
        </a>
      </li>

      <li class="{{ request()->routeIs('teams.*') ? 'active' : '' }}">
        <a href="{{ route('teams.index') }}">
          <i class="zmdi zmdi-accounts-alt"></i> <span>Tim Saya</span>
        </a>
      </li>

    </ul>
   
   </div>
   <header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
            <p class="user-subtitle">{{ Auth::user()->email }}</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="{{ route('profile.edit') }}"><i class="icon-user mr-2"></i> Profil</a></li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="logout-link">
                    <i class="icon-power mr-2"></i> Logout
                </a>
            </form>
        </li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

    @yield('content')

	<div class="overlay toggle-menu"></div>
		</div>
    </div><a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2025 Manajemen Proyek KP
        </div>
      </div>
    </footer>
	</div><script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('template/assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('template/assets/js/bootstrap.min.js') }}"></script>
	
 <script src="{{ asset('template/assets/plugins/simplebar/js/simplebar.js') }}"></script>
  <script src="{{ asset('template/assets/js/sidebar-menu.js') }}"></script>
  
  <script src="{{ asset('template/assets/js/app-script.js') }}"></script>
	
</body>
</html>