			<?php global $cvcard; ?>			

				<footer class="site-footer col-sm-12" role="contentinfo">					

						<div class="copyright col-sm-6">
									
							<?php if(isset($cvcard['opt-editor'])){ ?>

							<p><?php echo $cvcard['opt-editor']; ?></p>

							<?php } ?>

						</div> <!-- end copyright -->

						

						<?php if(isset($cvcard['opt-switch'])){

						if($cvcard['opt-switch']==true){ ?>

							<div class="bookmark col-sm-6">

								<p class="p-text"><?php _e('Theme by','cvcard'); ?> <a href="<?php echo esc_url('http://burak-aydin.com'); ?>" class="u-url" target="_blank" rel="generator">Burak Aydin</a> | <?php _e('Powered by','cvcard'); ?> <a href="<?php echo esc_url('http://wordpress.org'); ?>" target="_blank" rel="generator">WordPress</a></p>
									
							</div> <!-- end bookmark -->

						<?php } } ?>						
			
				</footer> <!-- end site-footer -->

			
		</div> <!-- end container -->

</div> <!-- end site-single -->