
			<br>
			<!-- Products List -->
			<div class="col-md-10 col-sm-10 padbot20" id="view">
				<?php	
					$attr = array('role' => 'form', 'class'=>'form-horizontal');
				echo form_open('admin/users/registration', $attr); 
			?>
				  <div class="form-group">
				    <label for="fullname" class="col-sm-2 control-label">Full Name</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="fullname"value="<?php echo set_value('fullname'); ?>" name="fullname" placeholder="Full Name ">
				    	<span class="help-block"><?php echo form_error('fullname') ?></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="username" class="col-sm-2 control-label">Username</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
				    	<span class="help-block"><?php echo form_error('username') ?></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="password" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-4">
				      <input type="password" class="form-control" id="password"value="<?php echo set_value('password'); ?>" name="password" placeholder="Password ">
				    	<span class="help-block"><?php echo form_error('password') ?></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="conf_password" class="col-sm-2 control-label">Confirm Password</label>
				    <div class="col-sm-4">
				      <input type="password" class="form-control" id="conf_password" name="conf_password" value="<?php echo set_value('conf_password'); ?>" placeholder=" Confirm Password">
				    	<span class="help-block"><?php echo form_error('conf_password') ?></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="email" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-4">
				      <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder=" Email">
				    	<span class="help-block"><?php echo form_error('email') ?></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Sign in</button>
				    </div>
				  </div>
			</form>
				
				<div class="clear"></div>
				
			</div><!-- //Products List -->
		</div><!-- //Row -->
	</div><!-- //Container -->
</section><!-- //Shop Block -->
