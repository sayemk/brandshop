<section id="featured_products">
	<div class="container">
		<div class="page_title">
			<h2>&nbsp;</h2>
		</div>
		<div class="sorting_options clearfix">
			<h3 class="page-title">Shop</h3>
			<p class="woocommerce-result-count pull-left" style="margin-right:30px;">
			
			</p>
			<p class="mint-products-per-page pull-left">
				<span style="font-size:18px">View: </span>
				<span style="font-size:13px"><?php echo $this->pagination->create_links(); ?></span>
			</p>
			
			<form id="categoryFilterForm" class="form-inline woocommerce-ordering pull-right margbot20">
			  <div class="form-group">
			    <label for="exampleInputName2">Name</label>
			    <select class="form-control" id='categoryFilter'>
						<option value="0">ALL</option>
					<?php
					  	foreach ($categories as  $cat_name) {
					  		if($cat_id==$cat_name->cat_id) $select='selected';

					  		echo "<option ".@$select." value=".$cat_name->cat_id.">".$cat_name->cat_name."</option>";
					  		$select='';
					  	}
					?>
			    </select>
			  </div>
			  
			</form>
			
			
		</div>

		<div class="row products_list">
		<!-- Animation-->
			
			<div align="center">

				<div id="ballsWaveG">
					<div id="ballsWaveG_1" class="ballsWaveG">
					</div>
					<div id="ballsWaveG_2" class="ballsWaveG">
					</div>
					<div id="ballsWaveG_3" class="ballsWaveG">
					</div>
					<div id="ballsWaveG_4" class="ballsWaveG">
					</div>
					<div id="ballsWaveG_5" class="ballsWaveG">
					</div>
					<div id="ballsWaveG_6" class="ballsWaveG">
					</div>
					<div id="ballsWaveG_7" class="ballsWaveG">
					</div>
					<div id="ballsWaveG_8" class="ballsWaveG">
					</div>
				</div> 
			</div>
			<!-- Animation end-->
		<?php foreach ($products as $product) {
			//print_r($image);
			//exit();

		?>
			<div class="col-md-4 col-sm-6 col-xs-6 col-ss-12 padbot30 product_item_wrap">
				<div class="product_item">
					<div class="product_img_wrap">
						<a href="<?php echo base_url().'products/details/'.$product->p_id; ?>"><img src="<?php echo base_url().'/assets/images/products/'.$product->img_name; ?>" alt="Product Image" /></a>
					</div>
					<div class="product_description center">
						<a class="zoom" href="<?php echo base_url().'/assets/images/products/'.$product->img_name; ?>" rel="prettyPhoto[products1]"><i class="fe icon_search"></i></a>
						<!--a class="wish_button" href="javascript:void(0);"><i class="fe icon_heart"></i></a -->
						<div class="product_title_wrap">
							<h4 class="product_title"><?php echo anchor('products/details/'.$product->p_id, $product->p_name, array('title' => 'Click To View Details')); ?></h4>
							<div class="price">BDT <?php echo $product->price; ?></div>
						</div>

						<?php echo anchor('cart/add/'.$product->p_id, 'Add to Cart', array('class'=>'add_to_cart_button')); ?>
					</div>
				</div>
			</div>
			<?php 
				}
			?>
			
		</div>
	</div>
</section><!-- //Featured Products -->

