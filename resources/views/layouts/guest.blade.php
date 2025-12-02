<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>Manajemen Proyek - Autentikasi</title>

  <link href="{{ asset('template/assets/css/pace.min.css') }}" rel="stylesheet"/>
  <script src="{{ asset('template/assets/js/pace.min.js') }}"></script>
  <link rel="icon" href="{{ asset('template/assets/images/favicon.ico') }}" type="image/x-icon">
  <link href="{{ asset('template/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('template/assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('template/assets/css/app-style.css') }}" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
<div id="wrapper">
	<div class="card card-authentication1 mx-auto my-5">

        {{-- Di sinilah konten (form login/register) akan disisipkan --}}
		{{ $slot }}

	</div>
	
	<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    </div><script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('template/assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('template/assets/js/bootstrap.min.js') }}"></script>
	
  <script src="{{ asset('template/assets/js/horizontal-menu.js') }}"></script>
  
  <script src="{{ asset('template/assets/js/app-script.js') }}"></script>

</body>
</html>