
			<br>
			<!-- Products List -->
			<div class="col-md-10 col-sm-10 padbot20" id="view">
					
					<table class="table table-stripped">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$count=1;
								foreach ($users as $user) {
									?>
									
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $user->fullname; ?></td>
								<td><?php echo $user->username; ?></td>
								<td><?php echo $user->email; ?></td>
								<td><?php echo anchor('admin/users/Del/'.$user->user_id, '<button class="btn btn-danger">Delete</button>');$user->fullname; ?></td>
							</tr>
							<?php 
								$count++;
								}
							?>
						</tbody>
					</table>
				
				<div class="clear"></div>
				
			</div><!-- //Products List -->
		</div><!-- //Row -->
	</div><!-- //Container -->
</section><!-- //Shop Block -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     	 <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
     	<div class="modal-body">
       
      </div>
      <br>
      <div class="modal-footer" style="border:none">
        
      </div>
    </div>
  </div>
</div>