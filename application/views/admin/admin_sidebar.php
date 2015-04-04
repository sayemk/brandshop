<!-- Breadcrumbs -->
<section class="breadcrumbs"></section>
<!-- //Breadcrumbs -->

<!-- Shop Block -->
<section class="shop_block">
	<div class="container">
		<div class="row">
			
			<!-- Shop Sidebar -->
			<div id="sidebar" class="col-md-2 col-sm-3">
				
				
				<!-- Categories -->
				<div class="sidepanel widget_categories">
					 
				    <div id="accordion">
								<h4>Orders</h4>
								<div>
									<h6><?php echo anchor('admin/orders/', 'View All'); ?> </h6>
									<!--h6><?php echo anchor('admin/orders/new', 'New Orders'); ?></h6 -->
								</div>
								<!--h4>Messages</h4>
								<div>
									<h6><?php echo anchor('admin/contact/', 'View All'); ?></h6>
									< h6><?php echo anchor('admin/contact/new', 'New Messages'); ?></h6>
								</div -->
								<h4>Products</h4>
								<div>
									<h6><?php echo anchor('admin/product/', 'View All'); ?></h6> 
									<h6><?php echo anchor('admin/product/add', 'Add new'); ?></h6> 
								</div>
								<h4>Category</h4>
								<div>
									<h6><?php echo anchor('admin/category/', 'View All'); ?></h6> 
									 
								</div>
								<h4>Users</h4>
								<div>
									<h6><?php echo anchor('admin/users/', 'View All'); ?></h6> 
									<h6><?php echo anchor('admin/users/add', 'Add new'); ?></h6> 
								</div>
							</div>
					
				</div>
				
			</div><!-- //Shop Sidebar -->