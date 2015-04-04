
<div class="map" id="map" style="height: 400px;">
	
</div><!-- //MAP -->
		
			
			
		
			<!-- CONTACT INFO -->
			<section class="contacts_block">
				
				<!-- CONTAINER -->	
				<div class="container">
				
					<!-- ROW -->
					<div class="row">
						<div class="col-lg-7 col-sm-7 padbot40">
							<div class="page_title">
								<h2>Get in Touch</h2>
							</div>
							
							<!-- CONTACT FORM -->
							<div id="contact-form">
								<div id="sendmessage">

									<div class="alert alert-success alert-dismissible" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  Your message has been sent. Thank you!
									</div>
								</div>
								<?php 
									$attr = array('role' => 'form', 'class'=>'contactForm',
										'id'=>'contactForm');
									echo form_open('contact/connect', $attr); 
								?>
								
									<div class="row">
										<div class="form-group col-xs-6 col-ss-12">
											<input id="name" type="text" value="<?php echo set_value('con_name'); ?>" name="con_name" placeholder="Name" data-rule="required"  data-msg="Please enter your fullname" />
											<div class="validation"><span class="help-block"><?php echo form_error('con_name') ?></span></div>
										</div>
										
										<div class="form-group col-xs-6 col-ss-12">
											<input id="email" type="email" value="<?php echo set_value('con_email'); ?>" name="con_email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
											<div class="validation"><span class="help-block"><?php echo form_error('con_email') ?></span></div>
										</div>
										
									</div>
									<div class="form-group">
										<textarea value="<?php echo set_value('con_message'); ?>" name="con_message" placeholder="Message" data-rule="required" data-msg="Please enter your message"></textarea>
										<div class="validation"><span class="help-block"><?php echo form_error('con_message') ?></span></div>
									</div>
									<input type="submit" name="submit" value="Send" />
								</form>
							</div><!-- //CONTACT FORM -->
						</div>
						<div class="col-lg-5 col-sm-5 padbot40">
							<div class="page_title">
								<h2>Contact Us</h2>
							</div>
							
							<!-- CONTACT INFO -->
							<ul class="list4 contacts_info">
								<li><b class="fe icon_pin"></b><span>5512 Lorem Ipsum Vestibulum Mas, Dolor Sit Amet, 666</span></li>
								<li><b class="fe icon_mail"></b><span><a href="mailto:mail@compname.com" alt="">mail@compname.com</a></span></li>
								<li><b class="fe social_twitter"></b><span><a href="javascript:void(0);" alt="">twitter.com/companyname</a></span></li>
								<li><b class="fe icon_phone"></b><span>+1 800 450 69 35, +1 800 450 69 40</span></li>
								<li><b class="fe social_flickr"></b><span><a href="javascript:void(0);" alt="">flickr.com/photos/companyname</a></span></li>
								<li><b class="fe social_facebook"></b><span><a href="javascript:void(0);">facebook.com/companyname</a></span></li>
								<li><b class="fe social_vimeo"></b><span><a href="javascript:void(0);">vimeo.com/companyname</a></span></li>
							</ul><!-- //CONTACT INFO -->
						</div>
					</div><!-- //ROW -->
				</div><!-- //CONTAINER -->
			</section><!-- //CONTACTS INFO -->
			