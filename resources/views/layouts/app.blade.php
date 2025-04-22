<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>@yield('title','Dashboad')</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FontAwesome JS-->
    <!-- <script defer src="assets/plugins/fontawesome/js/all.min.js"></script> -->
	<link href="{{ asset('/fontawsome/css/fontawesome.css') }}" rel="stylesheet">
  	<link href="{{ asset('/fontawsome/css/brands.css') }}" rel="stylesheet">
  	<link href="{{ asset('/fontawsome/css/solid.css') }}" rel="stylesheet">

	<!-- Bootstrap 5.3V -->
	<link id="theme-style" rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    
    <!-- App CSS -->  
    <!-- <link id="theme-style" rel="stylesheet" href="assets/css/portal.css"> -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('/css/theme.css') }}">

	@stack('styles')   

</head> 

<body class="app"> 
	<header class="app-header fixed-top">  	
		@include('partial.topbar')
		@include('partial.sidepanel')
    </header><!--//app-header-->
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">@yield('page_name','Page name')</h1>
				@yield('main_body')
			    				
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    @include('partial.footer')
	    
    </div><!--//app-wrapper-->    					

 
	<!-- Bootstrap 5.3V -->
	<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>


	<!-- Page Specific JS -->
    <script src="{{ asset('/js/theme.js') }}"></script> 

	@stack('scripts')   

</body>
</html> 

