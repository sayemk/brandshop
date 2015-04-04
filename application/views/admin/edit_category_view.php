
			<br>
			<!-- Products List -->
			<div class="col-md-10 col-sm-10 padbot20" id="view">
				<?php	
					$attr = array('role' => 'form', 'class'=>'form-horizontal');
				echo form_open('admin/category/updateSet/', $attr); 
			?>
				  <div class="form-group">
				    <label for="category" class="col-sm-4 control-label">Category Name</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="category"value="<?php echo $category[0]->cat_name ?>" name="category" placeholder="Category Name ">
				    	<span class="help-block"><?php echo form_error('category') ?></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="category" class="col-sm-4 control-label">Status</label>
				    <div class="col-sm-6">
				     	<select name="cat_status" class="form-control" id="">
				     		<option value="1">Active</option>
				     		<option value="0">Inactive</option>
				     	</select>
				    	<span class="help-block"><?php echo form_error('status') ?></span>
				    </div>
				  </div>
				 
				  <div class="form-group">
				    <div class="col-sm-offset-4 col-sm-10">
				     <input type="hidden" name="cat_id" value="<?php echo $category[0]->cat_id ?>"/>
				      <button type="submit" class="btn btn-success">Create</button>
				    </div>
				  </div>
			</form>
				
				<div class="clear"></div>
				
			</div><!-- //Products List -->
		</div><!-- //Row -->
	</div><!-- //Container -->
</section><!-- //Shop Block -->
