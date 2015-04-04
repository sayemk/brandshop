
			<br>
			<!-- Products List -->
			<div class="col-md-10 col-sm-10 padbot20" >
				<div class="col-md-8 col-sm-8 padbot20" >
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#categoryModal">Add New</button>
				
				<br>
				<br>
				<table class="table table-condensed">
  					<thead>
  						<tr>
  							<th>Catergory Name</th>
  							<th>Action</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
  							foreach ($categories as $category) {
  								  						
  							?>
  						<tr>
  							<td><?php echo $category->cat_name; ?></td>
  							<td><?php if ($category->status) {
  								echo "Active";
  							} else {
  								echo "Inactive";
  							}
  							  ?></td>
  							<td align="right">
  								<?php echo anchor('admin/category/update/'.$category->cat_id, 'Edit', 
  									array('class'=>'btn btn-warning btn-sm','role'=>'button'));
  								echo "&nbsp;&nbsp;";
  								//echo anchor('admin/category/delete/'.$category->cat_id, 'Delete', 
  								//	array('class'=>'btn btn-danger btn-sm','role'=>'button'));
  								?>
  							</td>
  						</tr>
  						<?php
  							}
  						?>
  					</tbody>
				</table>
				
				<div class="clear"></div>
				
			</div><!-- //Products List -->
			</div>
		</div><!-- //Row -->
	</div><!-- //Container -->
</section><!-- //Shop Block -->

<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
      </div>
      <div class="modal-body">
        <?php	
					$attr = array('role' => 'form', 'class'=>'form-horizontal');
				echo form_open('admin/category/add/', $attr); 
			?>
				  <div class="form-group">
				    <label for="category" class="col-sm-4 control-label">Category Name</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="category"value="<?php echo set_value('category'); ?>" name="category" placeholder="Category Name ">
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
				      <button type="submit" class="btn btn-success">Create</button>
				    </div>
				  </div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
