<!-- Breadcrumbs -->
<section class="breadcrumbs">
	</br>
</section>
<!-- //Breadcrumbs -->
<?php 
	if (isset($error)) {
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Error!</strong> Data Validation error in your review.Please Provide proper Data.
		</div>
	<?php
		}
	if (isset($success)) {
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span Data Validation error in your review.Please Provide proparia-hidden="true">&times;</span></button>
		  <strong>Success!</strong> <?php echo $success;?>.
		</div>
	<?php
		}
	?>
<!-- Single Product -->
<section class="single_product padbot50">
	<div class="container">
		<div class="row single_product_wrap clearfix">
			<div class="col-lg-6 col-md-6 padbot20 product-image-wrapper">
				<div id="slider2" class="flexslider margbot30">
					<ul class="slides">
					<?php foreach ($images as $image) {
						# code...
					?>
						<li><img src="<?php echo base_url().'assets/images/products/'.$image->img_name; ?>" alt="Product Image" /></li>
						
					<?php
						}
					?>	
						
					</ul>
				</div>
				
			</div>
			<div class="col-lg-6 col-md-6 single_product_details">
				<h2 class="single_product_title"><?php echo $product[0]->p_name;?></h2>
				<div class="price margbot20">
					
					<ins>BDT <?php echo $product[0]->price;?></ins>
				</div>
				
				<div class="single_product_description">
					<p><?php echo $product[0]->p_summary;?></p>
				</div>
				<div class="qty_wrap">
					<div class="quantity">
						<a class="minus button" href="javascript:void(0);">-</a>
						<input class="input-text qty text" type="number" size="4" title="Qty" value="1" name="quantity" min="1" step="1">
						<a class="plus button" href="javascript:void(0);">+</a>
					</div>
					
					<?php echo anchor('cart/add/'.$product[0]->p_id, 'Add to Cart', array('class'=>'single_add_to_cart_button')); ?>
					
				</div>
				<div class="woocommerce-tabs">
					<ul id="myTab" class="nav nav-tabs">
						<li class="active"><a href="#Description" data-toggle="tab">Description</a></li>
						<li class=""><a href="#Additional" data-toggle="tab">Additional Info</a></li>
						<li class=""><a href="#Reviews" data-toggle="tab">Reviews (<?php echo $commentsNumber; ?>)</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active clearfix" id="Description">
							<p><?php echo $product[0]->p_summary;?></p>
						</div>
						<div class="tab-pane fade clearfix" id="Additional">
							<table class="shop_attributes">
								<tbody>
									<tr class="">
										<th>Color</th>
										<th></th>
										<td><?php echo $product[0]->p_color;?></td>
									</tr>
									<tr class="alt">
										<th>Dimensions </th>
										<th style="padding:5px;"></th>
										<td><?php echo $product[0]->p_dimension;?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="tab-pane fade clearfix" id="Reviews">
							<div id="tab-reviews" class="entry-content">
								<div id="reviews" class="clearfix">
									<div id="comments">
										<ol class="commentlist">
											<?php foreach ($comments as $comment) {
												# code...
											?>
											<li class="comment">
												<!--img class="avatar" src="images/avatar1.jpg" alt="" /-->
												<div class="comment-text">
													<div class="product_rating">
													<?php 
														for ($i=1; $i <= 5 ; $i++) {
															if ($comment->star>=$i) {
															 	echo '<i class="fe icon_star"></i>';
															 }else{
															 	echo '<i class="fe icon_star_alt"></i>';
															 }
														
															
														
														}
													?>
													</div>

													<p class="meta"><strong><?php echo $comment->com_name;?></strong> &ndash; <time><?php echo $comment->com_date;?></time>:</p>
													<div class="description">
														<p><?php echo $comment->comment;?></p>
													</div>
												</div>
											</li><!-- #comment-## -->
											<?php 
												}
											?>
											<!-- #comment-## -->
										</ol>
									</div>
									<div id="review_form_wrapper">
										<div id="review_form">
											<div class="comment-respond" id="respond">
												<h5 class="comment-reply-title">Add a review</h5>
												<?php 
													$attr = array('role' => 'form', 'class'=>'comment-form',
														'id'=>'commentform');
													echo form_open('products/review', $attr); 
												?>
													<p class="comment-form-author">
														<input type="text" value="<?php echo set_value('author'); ?>" required name="author" id="author" placeholder="Name *" />
														<span class="help-block"><?php echo form_error('author') ?></span>

													</p>
													<p class="comment-form-email">
														<input type="text" value="<?php echo set_value('email'); ?>" required name="email" id="email" placeholder="Email *" />
														<span class="help-block"><?php echo form_error('email') ?></span>
													</p>
													<p class="comment-form-rating">
														<div class="product_rating">
															<input type="radio" class="rating-input" id="rating-input-1-5" value="5" name="rating_input" />
															<label for="rating-input-1-5" class="rating-star fe icon_star"></label>
															<input type="radio" class="rating-input" id="rating-input-1-4" value="4" name="rating_input" />
															<label for="rating-input-1-4" class="rating-star fe icon_star"></label>
															<input type="radio" class="rating-input" id="rating-input-1-3" value="3" name="rating_input" />
															<label for="rating-input-1-3" class="rating-star fe icon_star"></label>
															<input type="radio" class="rating-input" id="rating-input-1-2" value="2" name="rating_input" />
															<label for="rating-input-1-2" class="rating-star fe icon_star"></label>
															<input type="radio" class="rating-input" id="rating-input-1-1" value="1" name="rating_input" />
															<label for="rating-input-1-1" class="rating-star fe icon_star"></label>
														</div>
													</p>
													<p class="comment-form-comment">
														<input type="hidden" name="p_id" value="<?php echo $product[0]->p_id; ?>"/>
														<textarea value="<?php echo set_value('comment'); ?>" required name="comment" id="comment" placeholder="Your Review"></textarea>
														<span class="help-block"><?php echo form_error('comment') ?></span>
													</p>
													<p class="form-submit">
														<input type="submit" value="Submit" id="submit" name="Comments" />
													</p>
												</form>
											</div><!-- #respond -->
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- //Container -->
</section><!-- //Single Product -->
			