
			<br>
			<!-- Products List -->
			<div class="col-md-9 col-sm-8 padbot20">

			<?php echo form_open_multipart('admin/product/addNew/',array('class'=>'form-horizontal')); ?>
				<?php if(validation_errors() || @$error){
					?>
				<div class="alert alert-danger alert-dismissible fade in" role="alert">
			      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      <h4>You got an error!</h4>
			      <p><?php echo validation_errors(); ?>.</p>
			      <p><?php echo @$error['error']; ?>.</p>
			    </div>
			    <?php
					}
				?>
				<?php if(@$message){
					?>
				<div class="alert alert-success alert-dismissible fade in" role="alert">
			      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      <h4>Success!</h4>
			     
			      <p><?php echo $message; ?>.</p>
			    </div>
			    <?php
					}
				?>

				<div class="col-md-6 col-sm-6">
				 	<div class="form-group">
				    	<label for="p_name" class="col-sm-2 control-label">Name</label>
				   		<div class="col-sm-10">
				    		<input required type="text" class="form-control" value="<?php echo set_value('p_name'); ?>" name="p_name" id="p_name" placeholder="Product Name">
				    	</div>
				    </div>
				    <div class="form-group">
					    <label for="p_category" class="col-sm-2 control-label">Category</label>
					    <div class="col-sm-10">
					    	<select name="p_category" class="form-control">
							  <?php
							  	foreach ($categories as  $cat_name) {
							  		if(set_value('p_category')==$cat_name->cat_id) $select='selected';

							  		echo "<option ".@$select." value=".$cat_name->cat_id.">".$cat_name->cat_name."</option>";
							  		# code...
							  	}
							  ?>
							</select>
					    </div>
				    </div>
				    <div class="form-group">
				    	<label for="p_color" class="col-sm-2 control-label">Colors</label>
				   		<div class="col-sm-10">
				    		<input required type="text" class="form-control" value="<?php echo set_value('p_color'); ?>" name="p_color" id="p_color" placeholder="Write products colors separate by comma.">
				    	</div>
				    </div>
				    <div class="form-group">
					    <label for="p_size" class="col-sm-2 control-label">Sizes</label>
					    <div class="col-sm-10">
					    	<input required  type="text" class="form-control" value="<?php echo set_value('p_size'); ?>" name="p_size" id="p_size" placeholder="Write products sizes separate by comma.">
					    </div>
				    </div>
				    <div class="form-group">
				    	<label for="p_price" class="col-sm-2 control-label">Price</label>
				   		<div class="col-sm-10">
				    		<input  required type="number" class="form-control" value="<?php echo set_value('p_price'); ?>" name="p_price" id="p_price" placeholder="Product unit Price">
				    	</div>
				    </div>
				    
				    <div class="form-group">
				    	<label for="p_image" class="col-sm-2 control-label">Image</label>
				   		<div class="col-sm-10">
				    		 <input required type="file" value="<?php echo set_value('p_image'); ?>" name="p_image"id="exampleInputFile">
   							 <p class="help-block">Select an Image for the product</p>
				    	</div>
				    </div>
				    <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button  type="submit" class="btn btn-primary">Save Product</button>
					    </div>
					  </div>
				    
				    
				 	
				 </div>
				 <div class="col-md-6 col-sm-6">
				 	
				    <div class="form-group">
				    	<label for="p_status" class="col-sm-2 control-label">Status</label>
				   		<div class="col-sm-10">
				    		<label class="radio-inline">
							  <input type="radio" name="p_status" id="p_status1" value="1">Active
							</label>
							<label class="radio-inline">
							  <input  type="radio" name="p_status" id="p_status2" value="0">Disable
							</label>
							
				    	</div>
				    </div>
				    <div class="form-group">
				    	<label for="p_featured" class="col-sm-2 control-label">Featured</label>
				   		<div class="col-sm-10">
				    		<label class="radio-inline">
							  <input  type="radio" name="p_featured" id="p_featured1" value="1">Yes
							</label>
							<label class="radio-inline">
							  <input type="radio" name="p_featured" id="p_featured2" value="0">No
							</label>
							
				    	</div>
				    </div>
				    <div class="form-group">
				    	<label for="p_summary" class="col-sm-2 control-label">Summary</label>
				   		<div class="col-sm-10">
				    		<textarea  required  class="form-control" name="p_summary" rows="2" placeholder="Product summary"><?php echo set_value('p_summary'); ?></textarea>
				    	</div>
				    </div>
				    <div class="form-group">
					    <label for="p_desc" class="col-sm-2 control-label">Desc.</label>
					    <div class="col-sm-10">
					    	<textarea required  class="form-control" name="p_desc" rows="2" placeholder="Product description"><?php echo set_value('p_desc'); ?> </textarea>
					    </div>
				    </div>
				    
				    
				 	
				 </div>
				
				
				
				<div class="clear"></div>
				
			</div><!-- //Products List -->
		</div><!-- //Row -->
	</div><!-- //Container -->
</section><!-- //Shop Block -->