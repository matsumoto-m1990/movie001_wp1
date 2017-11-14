<?php /* Template Name: Homepage */ ?>

<?php global $cvcard;

get_header();

$homepage=get_posts(array(
	'post_type' => 'page',
	'posts_per_page' => -1
	));
?>


<div class="homepage">

		<div class="container">

			<div class="col-sm-6 col-md-3">

			<?php if(isset($cvcard['your_photo']['url'])){ 
				
				if($cvcard['your_photo']['url']){ ?>
					
					<div class="circle cv-img">
					
						<img src="<?php echo $cvcard['your_photo']['url']; ?>" class="u-photo" alt="<?php __('Vcard Photo','cvcard'); ?>">

					</div> <!-- end circle -->

				<?php } } 

				if(isset($cvcard['your_name'])){ 

				if($cvcard['your_name'] && $cvcard['your_job']){ ?>

					<div class="circle h-card">

						<div class="name-div">
							<p class="p-name"><?php echo $cvcard['your_name']; ?></p>
						</div> <!-- end name-div -->

						<div class="job-title-div">
							<p class="p-job-title"><?php echo $cvcard['your_job']; ?></p>
						</div> <!-- end job-title-div -->
					
					</div> <!-- end circle -->

				<?php } } ?>

			</div> <!-- end col-sm-6 -->


			<div class="col-sm-6 col-md-3">	

				<?php foreach($homepage as $post){ 

					$circle=get_post_meta( $post->ID, '_wp_page_template',true); ?>				

				<?php if($circle=='page-about.php'){ ?>				

					<div class="circle">
						
						<a href="<?php echo get_permalink($post->ID); ?>" class="u-url" title="<?php echo get_the_title($post->ID); ?>" data-toggle="tooltip" data-original-title="about"><i class="fa fa-user"></i></a>

						<div class="tooltip-mobile">
							<a href="<?php echo get_permalink($post->ID); ?>" class="u-url"><?php echo get_the_title($post->ID); ?></a>
						</div> <!-- end tooltip-mobile -->

					</div> <!-- end circle -->

				<?php } } ?>



				<?php foreach($homepage as $post){ 

					$circle=get_post_meta( $post->ID, '_wp_page_template',true); ?>				

				<?php if($circle=='page-resume.php'){ ?>	

				<div class="circle">

					<a href="<?php echo get_permalink($post->ID); ?>" class="u-url" title="<?php echo get_the_title($post->ID); ?>" data-toggle="tooltip" data-original-title="resume"><i class="fa fa-book"></i></a>
					
					<div class="tooltip-mobile">
						<a href="<?php echo get_permalink($post->ID); ?>" class="u-url"><?php echo get_the_title($post->ID); ?></a>
					</div> <!-- end tooltip-mobile -->

				</div> <!-- end circle -->

				<?php } } ?>

			</div> <!-- end col-sm-6 -->


			<div class="col-sm-6 col-md-3">
				
				<?php foreach($homepage as $post){ 

					$circle=get_post_meta( $post->ID, '_wp_page_template',true); ?>				

				<?php if($circle=='page-portfolio.php'){ ?>

				<div class="circle">

					<a href="<?php echo get_permalink($post->ID); ?>" class="u-url" title="<?php echo get_the_title($post->ID); ?>" data-toggle="tooltip" data-original-title="portfolio"><i class="fa fa-briefcase"></i></a>

					<div class="tooltip-mobile">
						<a href="<?php echo get_permalink($post->ID); ?>" class="u-url"><?php echo get_the_title($post->ID); ?></a>
					</div> <!-- end tooltip-mobile -->
					
				</div> <!-- end circle -->

				<?php } } ?>
				
				

				<?php foreach($homepage as $post){ 

					$circle=get_post_meta( $post->ID, '_wp_page_template',true); ?>				

				<?php if($circle=='page-contact.php'){ ?>

				<div class="circle">

					<a href="<?php echo get_permalink($post->ID); ?>" class="u-url" title="<?php echo get_the_title($post->ID); ?>" data-toggle="tooltip" data-original-title="contact"><i class="fa fa-envelope"></i></a>
					
					<div class="tooltip-mobile">
						<a href="<?php echo get_permalink($post->ID); ?>" class="u-url"><?php echo get_the_title($post->ID); ?></a>
					</div> <!-- end tooltip-mobile -->

				</div> <!-- end circle -->

				<?php } } ?>

			</div> <!-- end col-sm-6 -->

			<div class="col-sm-6 col-md-3">

				<?php foreach($homepage as $post){ 

					$circle=get_post_meta( $post->ID, '_wp_page_template',true); ?>				

				<?php if($circle=='template-blog.php'){ ?>
				
				<div class="circle">

					<a href="<?php echo get_permalink($post->ID); ?>" class="u-url" title="<?php echo get_the_title($post->ID); ?>" data-toggle="tooltip" data-original-title="blog"><i class="fa fa-globe"></i></a>
					
					<div class="tooltip-mobile">
						<a href="<?php echo get_permalink($post->ID); ?>" class="u-url"><?php echo get_the_title($post->ID); ?></a>
					</div> <!-- end tooltip-mobile -->

				</div> <!-- end circle -->

				<?php } } ?>



				<?php if($cvcard['upload_resume']['url']){ ?>

					<div class="circle">

						<a href="<?php echo $cvcard['upload_resume']['url']; ?>" class="u-url" data-toggle="tooltip" data-original-title="download resume"><i class="fa fa-file-text"></i></a>		

						<div class="tooltip-mobile">
							<a href="<?php echo $cvcard['upload_resume']['url']; ?>" class="u-url"><?php _e('download resume','cvcard'); ?></a>
						</div> <!-- end tooltip-mobile -->
					
					</div> <!-- end circle -->

				<?php } ?>

			</div> <!-- end col-sm-6 -->

			
		
		</div> <!-- end container -->
		
	</div>	<!-- end homepage -->

<?php get_footer(); ?>