<div id="app-sidepanel" class="app-sidepanel"> 
	<div id="sidepanel-drop" class="sidepanel-drop"></div>
	<div class="sidepanel-inner d-flex flex-column">
		<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		<div class="app-branding">
			<a class="app-logo" href="/"><span class="logo-text">{{ config('app.name') }}</span></a>

		</div><!--//app-branding-->  
		
		<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
			<ul class="app-menu list-unstyled accordion" id="menu-accordion">
				<li class="nav-item">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link active" href="{{ route('check_min', ['min'=>20]) }}">
						<span class="nav-icon">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
							<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
							</svg>
							</span>
							<span class="nav-link-text">Check MIN</span>
					</a><!--//nav-link-->
				</li><!--//nav-item-->

				<li class="nav-item has-submenu">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
						<span class="nav-icon">
						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
							<path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
							</svg>
							</span>
							<span class="nav-link-text">VLE Logs</span>
							<span class="submenu-arrow">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
								</svg>
							</span><!--//submenu-arrow-->
					</a><!--//nav-link-->
					<div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
						<ul class="submenu-list list-unstyled">
							<li class="submenu-item"><a class="submenu-link" href="notifications.html">Integration Log</a></li>
							<li class="submenu-item"><a class="submenu-link" href="account.html">Archived Log</a></li>
							<li class="submenu-item"><a class="submenu-link" href="settings.html">Expried Relationships</a></li>
						</ul>
					</div>
				</li><!--//nav-item-->
				
				<li class="nav-item">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link" href="charts.html">
						<span class="nav-icon">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
							</svg>
							</span>
							<span class="nav-link-text">Bulk Sync</span>
					</a><!--//nav-link-->
				</li><!--//nav-item-->

				<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="orders.html">
						        <span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
										<path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
										<circle cx="3.5" cy="5.5" r=".5"/>
										<circle cx="3.5" cy="8" r=".5"/>
										<circle cx="3.5" cy="10.5" r=".5"/>
									</svg>
						        </span>
		                        <span class="nav-link-text">Settings</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
				
				<li class="nav-item">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link" href="help.html">
						<span class="nav-icon">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-question-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
							<path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
							</svg>
							</span>
							<span class="nav-link-text">Help</span>
					</a><!--//nav-link-->
				</li><!--//nav-item-->					    
			</ul><!--//app-menu-->
		</nav><!--//app-nav-->

		<div class="app-sidepanel-footer">
			<nav class="app-nav app-nav-footer">			
				<ul class="app-menu footer-menu list-unstyled">
					<li class="nav-item">
						Developer by Dush for RACP 2023
					</li><!--//nav-item-->					
				</ul><!--//footer-menu-->
			</nav>
		</div><!--//app-sidepanel-footer-->

	</div><!--//sidepanel-inner-->
</div><!--//app-sidepanel-->