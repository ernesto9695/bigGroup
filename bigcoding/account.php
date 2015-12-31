<?php 
    $current = 0;
    require'inc/header.php';
     
    logged_only();
     ?>

  </header>
<!--==============================content================================-->
				<section id="content">
					<div class="container_12">
						<div class="wrapper indent-bot">
							<article class="grid_12">
								<div class="box">
									<div class="padding">
										<div class="wrapper">
										      <?php debug($_SESSION); ?>
											
										</div>
									</div>
								</div>
							</article>
						</div>
						
					</div>
					<div class="block"></div>
				</section>
			</div>
		</div>
<!--==============================footer=================================-->
<?php require'inc/footer.php'; ?>