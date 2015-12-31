  <?php $current='last';
   require 'inc/header.php' ?>
				</header>
<!--==============================content================================-->
				<section id="content">
					<div class="container_12">
						<div class="wrapper p4">
							<article class="grid_4">
								<div class="box">
									<div class="padding">
										<h3 class="p1">Contacts</h3>
										<dl>
											<dt><span>Country:</span>Germany</dt>
											<dd><span>Address:</span>Peter-Hille-Weg st. 13 </dd>
											<dd><span>City:</span>Paderborn</dd>
											<dd><span>Email:</span><a class="link" href="#">biggroup@gmail.com</a></dd>
										</dl>
									</div>
								</div>
							</article>
							<article class="grid_8">
								<div class="box">
									<div class="padding">
										<h3 class="p1">Miscellaneous Info</h3>
										Molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est expedita optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
									</div>
								</div>
							</article>
						</div>
						<div class="wrapper">
							<article class="grid_12">
								<div class="indent-left2">
									<h3 class="p1">Contact Form</h3>
									<form id="contact-form" method="post" enctype="multipart/form-data">
										<fieldset>
											  <label><span class="text-form">Your Name:</span><input name="p1" type="text" /></label>
											  <label><span class="text-form">Your E-mail:</span><input name="p2" type="text" /></label>
											  <div class="wrapper">
												<div class="text-form">Your Message:</div>
												<div class="extra-wrap">
													<textarea></textarea>
													<div class="clear"></div>
													<div class="buttons">
														<a class="button" href="#" onClick="document.getElementById('contact-form').reset()">Clear</a>
														<a class="button" href="#" onClick="document.getElementById('contact-form').submit()">Send</a>
													</div>
												</div>
											  </div>
										</fieldset>
									</form>
								</div>
							</article>
						</div>
					</div>
					<div class="block"></div>
				</section>
			</div>
		</div>
<!--==============================footer=================================-->
 <?php require 'inc/footer.php' ?>