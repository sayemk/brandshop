<!-- Footer -->
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-md-3 padbot30">
							<div class="widget widget_posts">
								<h4>Latest News</h4>
								<ul class="recent_posts">
									<li>
										<div class="pull-left recent_posts_img">
											<img src="<?php echo base_url(); ?>assets/images/blog/small1.jpg" alt="" />
										</div>
										<div class="recent_posts_content">
											<a class="post_title" href="blog-post.html">Mauris ut mauris sit amet nisi lobortis</a>
											<span class="recent_post_date">October 22, 2020</span>
										</div>
										<div class="clear"></div>
									</li>
									<li>
										<div class="pull-left recent_posts_img">
											<img src="<?php echo base_url(); ?>assets/images/blog/small2.jpg" alt="" />
										</div>
										<div class="recent_posts_content">
											<a class="post_title" href="blog-post.html">Mauris ut mauris sit</a>
											<span class="recent_post_date">October 22, 2020</span>
										</div>
										<div class="clear"></div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 padbot30">
							<div class="widget widget_newsletter">
								<h4>Newsletter</h4>
								<p>Vestibulum sem nulla, euismod ac facilisis in, condimentum adipiscing urna. Ut at diam mi. Vivamus sed ligula odio. Vivamus</p>
								<div id="newsletters-form-wrap">
									<form id="ajax-newsletters-form" action="#">
										<input type="text" name="email" value="" placeholder="Enter your Email..." />
										<input type="submit" value="" />
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-3 padbot30">
							<div class="widget widget_twitter">
								<h4>Latest Tweets</h4>
								<ul class="twitter_list tweet_module sidebar"></ul>
							</div>
						</div>
						<div class="col-md-3 padbot30">
							<div class="widget widget_links">
								<h4>My Account</h4>
								<ul>
									<li><a href="javascript:void(0);"><i class="fe arrow_carrot-right_alt2"></i>Aliquam tempus est sit amet orci</a></li>
									<li><a href="javascript:void(0);"><i class="fe arrow_carrot-right_alt2"></i>Quisque hendrerit velit erat</a></li>
									<li><a href="javascript:void(0);"><i class="fe arrow_carrot-right_alt2"></i>In bibendum eros ultricies sit amet</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Copyright -->
				<div class="copyright clearfix">
					<div class="container">BrandShop<span> &copy; Copyright 2015</span></div>
				</div><!-- //Copyright -->
			</footer><!-- //Footer -->
		</div><!-- //Page Box -->
	</div><!-- //Page -->
	<div class="modal fade"  id="exampleModal" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="exampleModalLabel">Login</h4>
			      </div>
			      <div class="modal-body">
			       <?php 
						$attr = array('role' => 'form', 'class'=>'comment-form',
							'id'=>'commentform');
						echo form_open('login/', $attr); 
					?>
			          <div class="form-group">
			            <label for="Username" class="control-label">Username</label>
			            <input type="text" class="form-control" name="username" required  data-msg="Please enter your Username" placeholder="Username">
			          </div>
			          <div class="form-group">
			            <label for="Password" class="control-label">Password</label>
			            <input type="password" class="form-control" name="password" required data-msg="Please enter your Password" value="" placeholder="Password">
			          </div>
			        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
			       <button type="submit" class="btn btn-success">Login</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div
	
	<!-- SCRIPTS -->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><html class="ie" lang="en"> <![endif]-->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <?php 
	if($script=='admin'){
			?>
		<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
	<?php
		}
	?>
	
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/js/parallax.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<!--script src="<?php echo base_url() ?>assets/js/jquery.twitter.js" type="text/javascript"></script -->
	<script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/js/myscript.js" type="text/javascript"></script>
	<?php if(!is_null($script)){
		if($script=='contact'){
			?>
			<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script src="<?php echo base_url() ?>assets/js/goMap.js"></script>
			<script src="<?php echo base_url() ?>assets/js/validate.js"></script>
			<?php
		}
		if($script=='admin'){
			?>
			
			<script>
				      $(document).ready(function() {
					    var table = $('#example').DataTable( {
					        "ajax": "<?php echo base_url(); ?>admin/product/productsView",
					        "columnDefs": [ {
					            "targets": -1,
					            "data": null,
					            "defaultContent": "<button class='btn btn-light btn-xs'>View Details</button>"
					        } ]
					    } );
					 
					    $('#example tbody').on( 'click', 'button', function () {
					        var data = table.row( $(this).parents('tr') ).data();
					        
					        var p_id=data[1];
					        $.ajax({
					        	url: "<?php echo base_url(); ?>admin/product/productDetails/",
					        	type: 'GET',
					        	
					        	data: {"p_id": p_id},
					        })
					        .done(function(xhr,response) {
					        	console.log(xhr);
					        	$('#view').html(xhr);
					        })
					        .fail(function(error) {
					        	console.log(error);
					        })
					        .always(function() {
					        	console.log("complete");
					        });
					        

					        
					    } );
					} );

			$(document).ready(function() {
    var table = $('#order_view_table').DataTable( {
        "ajax": "/brandshop/admin/orders/getAll",
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='btn btn-warning'>View Details</button>"
        } ]
    } );
 
    $('#order_view_table tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        
        var o_id=data[1];
        $.ajax({
        	url: "/brandshop/admin/orders/orderDetails",
        	type: 'GET',
        	
        	data: {"o_id": o_id},
        })
        .done(function(xhr,response) {
        	console.log(xhr);
        	$('#myModalLabel').html(o_id);
        	$('.modal-body').html(xhr);
        	$('#myModal').modal('show')
        })
        	
        .fail(function(error) {
        	$('#view').html("Something went wrong. Plese Try again later!");
        })
        .always(function() {
        	console.log("complete");
        });
        

        
    } );
} );
			</script>
		<?php
		}
	}
	?>
	
	<script>									
		$(".button").on("click", function() {
			var $button = $(this);
			var oldValue = $button.parent().find("input").val();

			if ($button.text() == "+") {
				var newVal = parseFloat(oldValue) + 1;
			} else {
			// Don't allow decrementing below zero
				if (oldValue > 1) {
					var newVal = parseFloat(oldValue) - 1;
				} else {
					newVal = 1;
				}
			}
			$button.parent().find("input").val(newVal);
		});
	</script>
	<script>
    jQuery(document).ready(function() {
		jQuery("#home_carousel").owlCarousel({
			autoplay:			true,
			autoplayTimeout:	3000,
			autoplayHoverPause:	true,
			loop: 				true,
			smartSpeed:			900,
			items : 			2,
			responsive: {
				0:		{ items:1 },
				480:	{ items:2, margin: 50 },
				768:	{ items:2, margin: 150 },
				1024:	{ items:2, margin: 150 },
				1025:	{ items:2, margin: 356 }
			},
			pagination : 		false
		});
    });
	</script>
	
	<div style="display:none !important;">
	<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 1017901861;
		var google_custom_params = window.google_tag_params;
		var google_remarketing_only = true;
		/* ]]> */
		$('#exampleModal').on('shown.bs.modal', function () {
   		 	$('#myInput').focus()
  		})
	</script>
		
		
	</div>
	
</body>

</html>