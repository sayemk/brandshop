
			<br>
			<!-- Products List -->
			<div class="col-md-9 col-sm-8 padbot20">
			
				<div class="row products_list">
					<div class="col-md-4 col-sm-6 col-xs-6 col-ss-12 padbot30 product_item_wrap">
						<div class="product_item">
							<div class="product_img_wrap">
								<a href="product-page.html"><img style="height:256px"class="img-thumbnail" src="<?php echo base_url(); ?>assets/images/shopping-cart-hi.png" alt="" /></a>
							</div>
							<div class="product_description center">
								<div class="product_title_wrap">
									<span style="background-color:red; font-size:1.5em; " class="badge"><?php echo $or_new; ?></span>
									<h4 class="product_title"><?php echo anchor('admin/orders/', 'Total Order'); ?></h4>
									<div class="price"><?php echo $total_or; ?></div>
								</div>
							
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-ss-12 padbot30 product_item_wrap">
						<div class="product_item">
							<div class="product_img_wrap">
								<a href="product-page.html"><img style="height:256px" class="img-thumbnail" src="<?php echo base_url(); ?>assets/images/Bar-chart-icon.png" alt="" /></a>
							</div>
							<div class="product_description center">
								<div class="product_title_wrap">
									<span style="background-color:red; font-size:2em; " class="badge"><?php echo $total_due[0]->order_due; ?></span>
									<h4 class="product_title">Total Sales</h4>
									<div class="price"><?php echo $total_sale[0]->order_price;?></div>
								</div>
								
							</div>
						</div>
					</div>
					<!--div class="col-md-4 col-sm-6 col-xs-6 col-ss-12 padbot30 product_item_wrap">
						<div class="product_item">
							<div class="product_img_wrap">
								
								<a href="product-page.html">
									<img style="height:256px" class="img-thumbnail" src="<?php //echo base_url(); ?>assets/images/create_ticket_256.png" alt="" />
								</a>
								
							</div>
							<div class="product_description center">
								
								
								<div class="product_title_wrap">
									<span style="background-color:red; font-size:2em;" class="badge"><?php echo $con_new; ?></span>
									<h4 class="product_title"><?php //echo anchor('admin/contacts/', 'Total Tickets'); ?></h4>
									<div class="price"><?php //echo $total_con; ?></div>
								</div>
								
							</div>
						</div>
					</div -->
					<div class="col-md-4 col-sm-6 col-xs-6 col-ss-12 padbot30 product_item_wrap">
						<div class="product_item">
							<div class="product_img_wrap">
								
								<a href="product-page.html">
									<img style="height:256px" class="img-thumbnail" src="<?php echo base_url(); ?>assets/images/products.png" alt="" />
								</a>
								
							</div>
							<div class="product_description center">
								
								
								<div class="product_title_wrap">
									<span style="background-color:red; font-size:2em;" class="badge"><?php echo $pro_new; ?></span>
									<h4 class="product_title"><?php echo anchor('admin/product/', 'Total Products'); ?></h4>
									<div class="price"><?php echo $total_pro; ?></div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="clear"></div>
				
			</div><!-- //Products List -->
		</div><!-- //Row -->
	</div><!-- //Container -->
</section><!-- //Shop Block -->