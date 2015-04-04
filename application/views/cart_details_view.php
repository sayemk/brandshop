<!-- Breadcrumbs -->
			<section class="breadcrumbs"></section>
			<!-- //Breadcrumbs -->
		
			<!-- Full Width -->
			<section>
			
				<!-- CONTAINER -->
				<div class="container">
					<div class="page_title">
						<h2>Your Shoping So Far!</h2>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-sm-12">

						<div class="table-responsive">
						    <table class="table">
						    	<thead>
						    		<tr>
						    			<th>#</th>
						    			<th>Name</th>
						    			<th>Image</th>
						    			<th>Description</th>
						    			<th>Quantity</th>
						    			<th>Unit Price</th>
						    			<th>Sub Total</th>
						    			<th>Action</th>
						    		</tr>
						    	</thead>
						    	<tbody>
						    		<tr>
						    			<?php
						    				$count=0;
						    				foreach ($contents as $items) {
						    				$desc=$this->cart->product_options($items['rowid'])	

						    				

						    			?>
						    			<td><?php echo ++$count; ?> </td>
						    			<td><?php echo $items['name'];?></td>
						    			<td class="td_cart_img">
											<img class="cart_img" src="<?php echo base_url().'assets/images/products/'.$desc['img']; ?>" alt="Products Image" />
											
										</td>
						    			<td>
						    				<b>Color : <?php echo $desc['color'];?><br>
						    				Size &nbsp;&nbsp;&nbsp;: <?php echo $desc['size']; ?>
						    				</b>
						    			</td>
						    			<td>
						    				<div class="quantity" >
												<a data-rowid="<?php echo $items['rowid']; ?>" class="minus button" href="javascript:void(0);">-</a>
												<input data-rowid="<?php echo $items['rowid']; ?>" class="input-text qty text" type="number" size="10" title="Qty" value="<?php echo $items['qty'];?>" id="quantity"name="quantity" min="1" step="1">
												<a data-rowid="<?php echo $items['rowid']; ?>" class="plus button" href="javascript:void(0);">+</a>
											</div>
						    			</td>
						    			<td class="cart_unit_price"><?php echo $items['price']; ?></td>
						    			<td class="cart_subtotal_price">BDT <?php echo $items['subtotal']; ?></td>
						    			<td><button type="button" data-rowid="<?php echo $items['rowid']; ?>" class=" deleteRow active btn btn-warning btn-sm">Remove</button> </td>

						    		</tr>
						    		<?php
						    			}
						    		?>
						    		<tr>
						    			<th colspan="5"></th>
						    			<th>Total</th>
						    			<th id="cart_total">BDT <?php echo $this->cart->total();?>.oo</th>
						    			
						    		</tr>
						    	</tbody>
						    </table>
						    <div class="continue_shopping col-md-4">
						    	<?php
						    		echo anchor('shop/', '<i style="display: inline-block; font-size: 1.7em; position: relative; top: 0.2em;"class="fe arrow_left"></i> Continue Shopping', array('class'=>'btn btn-info btn-lg btn-block'));
						    	?>
						    	<!--a href="/cart/viewcart/" type="button" class="btn btn-info btn-lg btn-block"><i style="display: inline-block; font-size: 1.7em; position: relative; top: 0.2em;"class="fe arrow_left"></i> Continue Shopping</a -->
						    </div>
						    <div class="place_order col-md-4">
						    	<?php
						    		echo anchor('order/', 'Place Order <i style="display: inline-block; font-size: 1.7em; position: relative; top: 0.2em;"class="fe arrow_right"></i>', array('class'=>'btn btn-success btn-lg btn-block'));
						    	?>
						    <!-- a type="button" class="btn btn-success btn-lg btn-block">Place Order<i style="display: inline-block; font-size: 1.7em; position: relative; top: 0.2em;" class="fe arrow_right"></i></a -->
						    </div>
						    	
						    </div>
						</div>	
						</div>
					</div>
					
				</div><!-- //CONTAINER -->
			</section><!-- //FULL WIDTH -->