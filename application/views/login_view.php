<!-- Breadcrumbs -->
<section class="breadcrumbs">
	</br>
</section>
<!-- //Breadcrumbs -->
<?php 
	if (isset($error)) {
		?>
		
		<div class="alert alert-danger alert-dismissible fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      <h4>You got an error!</h4>
	      <p><?php echo validation_errors(); ?>.</p>
	      <p>

	      <?php echo anchor('#exampleModal', '<button type="button" class="btn btn-danger">Try again</button>',array('data-toggle'=>"modal", 'data-target'=>"#exampleModal"));
	        	echo anchor('forgot/', '<button type="button" class="btn btn-primary">Forgot Password!</button>');
	       ?> 
	      </p>
	    </div>
 

	<?php
		}
	
	?>



			