<div class="app-header-inner">  
	<div class="container-fluid py-2">
		<div class="app-header-content"> 
			<div class="row justify-content-between align-items-center">		
				<div class="search-mobile-trigger d-sm-none col">
					<i class="search-mobile-trigger-icon fas fa-search"></i>
				</div><!--//col-->
				<div class="app-search-box col">
					<form class="app-search-form" method="GET" action="{{ route('search_min') }}">  {{ url()->current() }}
						@csrf 
						<input type="text" placeholder="Enter MIN" name="min" class="form-control search-input" value="{{ old('min')}}">
						<button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button> 
						<!-- {{ $errors }} -->
					</form>
				</div><!--//app-search-box-->
			</div><!--//row-->
		</div><!--//app-header-content-->
	</div><!--//container-fluid-->
</div><!--//app-header-inner-->