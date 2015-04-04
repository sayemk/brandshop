
<body>

	<!-- Preloader -->
	<div id="loader"><div class="bar"></div></div>
	<!-- //Preloader -->
	
	<!-- PAGE -->
	<div id="page" class="front_page">
		
		<!-- Page Box -->
		<div class="page_box">
		
			<!-- Top Line -->
			<div class="top_line clearfix">
				<div class="lang_select_wrap">
					<!--select class="lang_select" name="lang_select">
						<option selected="selected" value="english">English</option>
						<option value="french">French</option>
						<option value="german">German</option>
						<option value="italian">Italian</option>
					</select  --><span style="color:#bbb"><strong>Support</strong>: test@gmail.com | <strong>Phone</strong>: 01000000000</span>
				</div>
				
				<div class="top_search_wrap">
					<!-- <form id="top-search-form" action="#">
						<input type="text" name="text" value="" placeholder="" />
						<div class="search-submit-wrap"><input type="submit" value="" /></div>
					</form> -->

				</div>
				
				<!-- Mini Cart -->
				<div class="mini_cart">
					<?php
						if($this->session->userdata('islogedin')){
							echo anchor('logout/', 'Logout', array('class'=>'login_link'));
						}else{
					?>
							<a data-toggle="modal" data-target="#exampleModal" class="login_link" href="javascript:void(0);">Login</a> 
					<?php 
						}
					?>
					
					
					<!--a class="cart_link" href="">View Your Cart</a>-->  
					<?php echo anchor('cart/viewcart/', 'View Your Cart',array('class'=>'cart_link')); ?>
					<span class="cart_total" id="cart_total"></span>
				</div><!-- //Mini cart -->
			</div><!-- //Top Line -->
			
			<!-- Main Menu Block -->
			<div class="menu_block clearfix">

				<!-- Mobile menu button -->
				<a href="javascript:void(0)" class="mobile_menu_btn"><i class="fe icon_menu"></i></a>
				<!-- //Mobile menu button -->
				
				<!-- Main Menu -->
				<ul id="main_menu">
					<li <?php if($active=='home') echo 'class="current-menu-item"';?> ><?php echo anchor('home/', 'Home'); ?></li>
					<!--li class="has-submenu">
						<a href="javascript:void(0);">Features</a>
						<ul class="sub-nav">
							<li><a href="typography.html">Typography</a></li>
							<li><a href="shortcodes.html">Shortcodes</a></li>
							<li><a href="full-width.html">Full Width</a></li>
							<li class="has-submenu">
								<a href="javascript:void(0);">Sub sub menu</a>
								<ul class="sub-sub-menu">
									<li><a href="javascript:void(0);">Sub sub item</a></li>
									<li><a href="javascript:void(0);">Sub sub item</a></li>
									<li><a href="javascript:void(0);">Sub sub item</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="has-submenu">
						<a href="javascript:void(0);">Pages</a>
						<ul class="sub-nav">
							<li><a href="about.html">About</a></li>
							<li><a href="shop.html">Shop</a></li>
							<li><a href="product-page.html">Product Page</a></li>
							<li><a href="full-width.html">Full Width</a></li>
							<li><a href="404.html">404 Page</a></li>
							<li><a href="coming-soon.html">Coming soon</a></li>
						</ul>
					</li>
					<li class="has-submenu">
						<a href="javascript:void(0);">Portfolio</a>
						<ul class="sub-nav">
							<li><a href="portfolio1.html">1 Column</a></li>
							<li><a href="portfolio2.html">2 Column</a></li>
							<li><a href="portfolio3.html">3 Column</a></li>
							<li><a href="portfolio4.html">4 Column</a></li>
							<li><a href="portfolio-post.html">Portfolio Post</a></li>
							<li><a href="portfolio-post-sidebar.html">Portfolio Post with Sidebar</a></li>
						</ul>
					</li>
					<li class="has-submenu">
						<a href="javascript:void(0);">Blog</a>
						<ul class="sub-nav">
							<li><a href="blog.html">Blog with sidebar</a></li>
							<li><a href="blog-post.html">Blog Post</a></li>
						</ul>
					</li -->
					
					<li <?php if($active=='shop') echo 'class="current-menu-item"';?> ><?php echo anchor('shop/', 'Shop'); ?></li>
					<li <?php if($active=='about') echo 'class="current-menu-item"';?> ><?php echo anchor('#', 'About Us'); ?></li>
					<li <?php if($active=='contact') echo 'class="current-menu-item"';?> ><?php echo anchor('contact/', 'Contacts'); ?></li>
					<?php if($this->session->userdata('username')){ ?>
						<li <?php if($active=='admin') echo 'class="current-menu-item"';?> ><?php echo anchor('admin/admin', 'Admin'); ?></li>
					<?php	} ?>	
						
				</ul><!-- //Main Menu -->
			</div><!-- //Main Menu Block -->

			<!-- Login Modal -->
			
			
	