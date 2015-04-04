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
						    			
						    		</tr>
						    	</thead>
						    	<tbody>
						    		<tr>
						    			<?php
						    				$count=0;
						    				foreach ($contents as $items) {
						    				$desc=$this->cart->product_options($items['rowid'])	;

						    				

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
						    				<?php echo $items['qty'];?>
						    			</td>
						    			<td class="cart_unit_price"><?php echo $items['price']; ?></td>
						    			<td class="cart_subtotal_price">BDT <?php echo $items['subtotal']; ?></td>
						    			
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
						   
						</div>
						<h4>Please Provide</h4>
						
						<?php 
							$attr = array('role' => 'form', 'class'=>'form-horizontal');
							echo form_open('order/place/', $attr); 
						?>
							  <div class="form-group">
							    <label for="cus_name" class="col-sm-2 control-label">Name</label>
							    <div class="col-sm-4">
							      <input type="text" value="<?php echo set_value('cus_name'); ?>" required class="form-control" name="cus_name" id="cus_name" placeholder="Full Name(Required)">
							    	<span class="help-block"><?php echo form_error('cus_name') ?></span>
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="cus_email" class="col-sm-2 control-label">Email</label>
							    <div class="col-sm-4">
							      <input type="email" value="<?php echo set_value('cus_email'); ?>" required class="form-control" name="cus_email" id="cus_email" placeholder="Email(Required)">
							    	<span class="help-block"><?php echo form_error('cus_email') ?></span>
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="cus_phone" class="col-sm-2 control-label">Phone</label>
							    <div class="col-sm-4">
							      <input type="text" value="<?php echo set_value('cus_phone'); ?>" required class="form-control" name="cus_phone" id="cus_phone" placeholder="Phone Number(Required)">
							    	<span class="help-block"><?php echo form_error('cus_phone') ?></span>
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="cus_email" class="col-sm-2 control-label">Address</label>
							    <div class="col-sm-4">
							      <textarea class="form-control" required name="cus_address" rows="3">
							      	<?php echo set_value('cus_address'); ?>

							      </textarea>
							     
							    	<span class="help-block"><?php echo form_error('cus_address') ?></span>
							    </div>
							  </div>
							  
							  <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-4">
							      <button type="submit" class="btn btn-success">Place Order</button>
							    </div>
							  </div>
							</form>

						</div>	
						</div>
					</div>
					
				</div><!-- //CONTAINER -->
			</section><!-- //FULL WIDTH -->