<section id="home" class="padbot0">
	<div class="home_logo"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" /></div>
	<div id="home_carousel" class="clearfix">
		<div class="item">
			<div class="home_product">
				<div class="slide_product_wrap"><img class="product" src="<?php echo base_url(); ?>assets/images/slider/1.png" alt="" /></div>
				<img class="shelf" src="<?php echo base_url(); ?>assets/images/slider/shelf.png" alt="" />
			</div>
		</div>
		<div class="item">
			<div class="home_product">
				<div class="slide_product_wrap"><img class="product" src="<?php echo base_url(); ?>assets/images/slider/2.png" alt="" /></div>
				<img class="shelf" src="<?php echo base_url(); ?>assets/images/slider/shelf.png" alt="" />
			</div>
		</div>
		<div class="item">
			<div class="home_product">
				<div class="slide_product_wrap"><img class="product" src="<?php echo base_url(); ?>assets/images/slider/1.png" alt="" /></div>
				<img class="shelf" src="<?php echo base_url(); ?>assets/images/slider/shelf.png" alt="" />
			</div>
		</div>
		<div class="item">
			<div class="home_product">
				<div class="slide_product_wrap"><img class="product" src="<?php echo base_url(); ?>assets/images/slider/2.png" alt="" /></div>
				<img class="shelf" src="<?php echo base_url(); ?>assets/images/slider/shelf.png" alt="" />
			</div>
		</div>
	</div>
</section>
<section id="featured_products">
	<div class="container">
		<div class="page_title center">
			<h2>Featured products</h2>
		</div>
		
		<div class="row products_list">
		<?php foreach ($featureImg as $image) {
			//print_r($image);
			//exit();

		?>
			<div class="col-md-4 col-sm-6 col-xs-6 col-ss-12 padbot30 product_item_wrap">
				<div class="product_item">
					<div class="product_img_wrap">
						<a href="<?php echo base_url().'/assets/images/products/'.$image->img_name; ?>"><img src="<?php echo base_url().'/assets/images/products/'.$image->img_name; ?>" alt="" /></a>
					</div>
					<div class="product_description center">
						<a class="zoom" href="<?php echo base_url().'/assets/images/products/'.$image->img_name; ?>" rel="prettyPhoto[products1]"><i class="fe icon_search"></i></a>
						<a class="wish_button" href="javascript:void(0);"><i class="fe icon_heart"></i></a>
						<div class="product_title_wrap">
							<h4 class="product_title"><?php echo anchor('products/details/'.$image->p_id, $image->p_name, array('title' => 'Click To View Details')); ?></h4>
							<div class="price">BDT <?php echo $image->price; ?></div>
						</div>
						<?php echo anchor('cart/add/'.$image->p_id, 'Add to Cart', array('class'=>'add_to_cart_button')); ?>
					</div>
				</div>
			</div>
			<?php 
				}
			?>
			
		</div>
	</div>
</section><!-- //Featured Products -->