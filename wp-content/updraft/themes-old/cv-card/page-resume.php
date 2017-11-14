<?php /* Template Name: Resume */ ?>

<?php get_header(); 

get_template_part('header','custom'); ?>

<div class="single-wrap col-xs-12 col-sm-12">

	<?php while(have_posts()):the_post(); ?>

	<?php if(function_exists('get_field')){ ?>		

	<div class="h-resume clearfix">	

		<div class="progress-wrap col-sm-6">
						
			<?php if(get_field('area_title_one')){ ?>
				<header class="resume-header">
					<h2 class="p-title"><?php the_field('area_title_one'); ?></h2>
				</header> <!-- end resume-header -->	
			<?php } ?>

			<?php if(get_field('progress_bar_title_one')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_one'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_one')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_one'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_one'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_two')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_two'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_two')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_two'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_two'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_three')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_three'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_three')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_three'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_three'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_four')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_four'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_four')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_four'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_four'); ?>
					</div>
				</div>
			<?php } ?>

		</div> <!-- end progress-wrap -->
		

		<div class="progress-wrap col-sm-6">
			
			<?php if(get_field('area_title_two')){ ?>
				<header class="resume-header">
					<h2 class="p-title"><?php the_field('area_title_two'); ?></h2>
				</header> <!-- end resume-header -->
			<?php } ?>

			<?php if(get_field('progress_bar_title_five')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_five'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_five')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_five'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_five'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_six')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_six'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_six')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_six'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_six'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_seven')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_seven'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_seven')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_seven'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_seven'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_eight')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_eight'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_eight')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_eight'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_eight'); ?>
					</div>
				</div>
			<?php } ?>

		</div> <!-- end progress-wrap -->
		

		<div class="progress-wrap col-sm-6">
			
			<?php if(get_field('area_title_3')){ ?>
				<header class="resume-header">
					<h2 class="p-title"><?php the_field('area_title_3'); ?></h2>
				</header> <!-- end resume-header -->
			<?php } ?>

			<?php if(get_field('progress_bar_title_nine')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_nine'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_nine')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_nine'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_nine'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_ten')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_ten'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_ten')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_ten'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_ten'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_eleven')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_eleven'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_eleven')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_eleven'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_eleven'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_twelve')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_twelve'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_twelve')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_twelve'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_twelve'); ?>
					</div>
				</div>
			<?php } ?>

		</div> <!-- end progress-wrap -->
		

		<div class="progress-wrap col-sm-6">
			
			<?php if(get_field('area_title_4')){ ?>
				<header class="resume-header">
					<h2 class="p-title"><?php the_field('area_title_4'); ?></h2>
				</header> <!-- end resume-header -->
			<?php } ?>

			<?php if(get_field('progress_bar_title_thirteen')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_thirteen'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_thirteen')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_thirteen'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_thirteen'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_fourteen')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_fourteen'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_fourteen')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_fourteen'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_fourteen'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_fifteen')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_fifteen'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_fifteen')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_fifteen'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_fifteen'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_sixteen')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_sixteen'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_sixteen')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_sixteen'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_sixteen'); ?>
					</div>
				</div>
			<?php } ?>

		</div> <!-- end progress-wrap -->
		

		<div class="progress-wrap col-sm-6">
			
			<?php if(get_field('area_title_5')){ ?>
				<header class="resume-header">
					<h2 class="p-title"><?php the_field('area_title_5'); ?></h2>
				</header> <!-- end resume-header -->
			<?php } ?>

			<?php if(get_field('progress_bar_title_seventeen')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_seventeen'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_seventeen')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_seventeen'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_seventeen'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_eighteen')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_eighteen'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_eighteen')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_eighteen'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_eighteen'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_nineteen')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_nineteen'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_nineteen')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_nineteen'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_nineteen'); ?>
					</div>
				</div>
			<?php } ?>

			<?php if(get_field('progress_bar_title_twenty')){ ?>
				<small class="p-skill"><?php the_field('progress_bar_title_twenty'); ?></small>
			<?php } ?>

			<?php if(get_field('progress_bar_percent_twenty')){ ?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_field('progress_bar_percent_twenty'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
						<?php the_field('progress_bar_percent_twenty'); ?>
					</div>
				</div>
			<?php } ?>

		</div> <!-- end progress-wrap -->





		<div class="expreince-wrap clearfix col-sm-6">

				<?php if(get_field('area_title_three')){ ?>
					<header class="expreince-header">
						<h2 class="p-title"><?php the_field('area_title_three'); ?></h2>
					</header> <!-- end resume-header -->			
				<?php } ?>

				<div class="expreince-content clearfix">

					<?php if(get_field('experience_name_one')){ ?>
						<h4 class="p-experience"><?php the_field('experience_name_one'); ?></h4>
					<?php } ?>

					<div class="dt-duration">

						<?php if(get_field('start_date_one')){ ?>						
							<small class="dt-start"><?php the_field('start_date_one'); ?></small>
						<?php } ?>

						<?php if(get_field('leave_date_one')){ ?>
							<small class="dt-end"><?php the_field('leave_date_one'); ?></small>
						<?php } ?>
									
					</div> <!-- end dt-duration -->

					<?php if(get_field('affiliation_one')){ ?>
						<h5 class="p-affiliation"><?php the_field('affiliation_one'); ?></h5>
					<?php } ?>

					<?php if(get_field('experience_summary_one')){ ?>					
						<p class="p-summary">
							<?php the_field('experience_summary_one'); ?>
						</p>
					<?php } ?>
								
				</div> <!-- end expreince-content -->


				<div class="expreince-content clearfix">

					<?php if(get_field('experience_name_two')){ ?>
						<h4 class="p-experience"><?php the_field('experience_name_two'); ?></h4>
					<?php } ?>

					<div class="dt-duration">

						<?php if(get_field('start_date_two')){ ?>						
							<small class="dt-start"><?php the_field('start_date_two'); ?></small>
						<?php } ?>

						<?php if(get_field('leave_date_two')){ ?>
							<small class="dt-end"><?php the_field('leave_date_two'); ?></small>
						<?php } ?>
									
					</div> <!-- end dt-duration -->

					<?php if(get_field('affiliation_two')){ ?>
						<h5 class="p-affiliation"><?php the_field('affiliation_two'); ?></h5>
					<?php } ?>

					<?php if(get_field('experience_summary_two')){ ?>					
						<p class="p-summary">
							<?php the_field('experience_summary_two'); ?>
						</p>
					<?php } ?>
								
				</div> <!-- end expreince-content -->

				<div class="expreince-content clearfix">

					<?php if(get_field('experience_name_three')){ ?>
						<h4 class="p-experience"><?php the_field('experience_name_three'); ?></h4>
					<?php } ?>

					<div class="dt-duration">

						<?php if(get_field('start_date_three')){ ?>						
							<small class="dt-start"><?php the_field('start_date_three'); ?></small>
						<?php } ?>

						<?php if(get_field('leave_date_three')){ ?>
							<small class="dt-end"><?php the_field('leave_date_three'); ?></small>
						<?php } ?>
									
					</div> <!-- end dt-duration -->

					<?php if(get_field('affiliation_three')){ ?>
						<h5 class="p-affiliation"><?php the_field('affiliation_three'); ?></h5>
					<?php } ?>

					<?php if(get_field('experience_summary_three')){ ?>					
						<p class="p-summary">
							<?php the_field('experience_summary_three'); ?>
						</p>
					<?php } ?>
								
				</div> <!-- end expreince-content -->

				<div class="expreince-content clearfix">

					<?php if(get_field('experience_name_four')){ ?>
						<h4 class="p-experience"><?php the_field('experience_name_four'); ?></h4>
					<?php } ?>

					<div class="dt-duration">

						<?php if(get_field('start_date_four')){ ?>						
							<small class="dt-start"><?php the_field('start_date_four'); ?></small>
						<?php } ?>

						<?php if(get_field('leave_date_four')){ ?>
							<small class="dt-end"><?php the_field('leave_date_four'); ?></small>
						<?php } ?>
									
					</div> <!-- end dt-duration -->

					<?php if(get_field('affiliation_four')){ ?>
						<h5 class="p-affiliation"><?php the_field('affiliation_four'); ?></h5>
					<?php } ?>

					<?php if(get_field('experience_summary_four')){ ?>					
						<p class="p-summary">
							<?php the_field('experience_summary_four'); ?>
						</p>
					<?php } ?>
								
				</div> <!-- end expreince-content -->

		</div> <!-- end experience-wrap -->

		<div class="expreince-wrap clearfix col-sm-6">

				<?php if(get_field('area_title_four')){ ?>
					<header class="expreince-header">
						<h2 class="p-title"><?php the_field('area_title_four'); ?></h2>
					</header> <!-- end resume-header -->			
				<?php } ?>		

				<div class="expreince-content clearfix">

					<?php if(get_field('experience_name_five')){ ?>
						<h4 class="p-experience"><?php the_field('experience_name_five'); ?></h4>
					<?php } ?>

					<div class="dt-duration">

						<?php if(get_field('start_date_five')){ ?>						
							<small class="dt-start"><?php the_field('start_date_five'); ?></small>
						<?php } ?>

						<?php if(get_field('leave_date_five')){ ?>
							<small class="dt-end"><?php the_field('leave_date_five'); ?></small>
						<?php } ?>
									
					</div> <!-- end dt-duration -->

					<?php if(get_field('affiliation_five')){ ?>
						<h5 class="p-affiliation"><?php the_field('affiliation_five'); ?></h5>
					<?php } ?>

					<?php if(get_field('experience_summary_five')){ ?>					
						<p class="p-summary">
							<?php the_field('experience_summary_five'); ?>
						</p>
					<?php } ?>
								
				</div> <!-- end expreince-content -->


				<div class="expreince-content clearfix">

					<?php if(get_field('experience_name_six')){ ?>
						<h4 class="p-experience"><?php the_field('experience_name_six'); ?></h4>
					<?php } ?>

					<div class="dt-duration">

						<?php if(get_field('start_date_six')){ ?>						
							<small class="dt-start"><?php the_field('start_date_six'); ?></small>
						<?php } ?>

						<?php if(get_field('leave_date_six')){ ?>
							<small class="dt-end"><?php the_field('leave_date_six'); ?></small>
						<?php } ?>
									
					</div> <!-- end dt-duration -->

					<?php if(get_field('affiliation_six')){ ?>
						<h5 class="p-affiliation"><?php the_field('affiliation_six'); ?></h5>
					<?php } ?>

					<?php if(get_field('experience_summary_six')){ ?>					
						<p class="p-summary">
							<?php the_field('experience_summary_six'); ?>
						</p>
					<?php } ?>
								
				</div> <!-- end expreince-content -->

				<div class="expreince-content clearfix">

					<?php if(get_field('experience_name_seven')){ ?>
						<h4 class="p-experience"><?php the_field('experience_name_seven'); ?></h4>
					<?php } ?>

					<div class="dt-duration">

						<?php if(get_field('start_date_seven')){ ?>						
							<small class="dt-start"><?php the_field('start_date_seven'); ?></small>
						<?php } ?>

						<?php if(get_field('leave_date_seven')){ ?>
							<small class="dt-end"><?php the_field('leave_date_seven'); ?></small>
						<?php } ?>
									
					</div> <!-- end dt-duration -->

					<?php if(get_field('affiliation_seven')){ ?>
						<h5 class="p-affiliation"><?php the_field('affiliation_seven'); ?></h5>
					<?php } ?>

					<?php if(get_field('experience_summary_seven')){ ?>					
						<p class="p-summary">
							<?php the_field('experience_summary_seven'); ?>
						</p>
					<?php } ?>
								
				</div> <!-- end expreince-content -->

				<div class="expreince-content clearfix">

					<?php if(get_field('experience_name_eight')){ ?>
						<h4 class="p-experience"><?php the_field('experience_name_eight'); ?></h4>
					<?php } ?>

					<div class="dt-duration">

						<?php if(get_field('start_date_eight')){ ?>						
							<small class="dt-start"><?php the_field('start_date_eight'); ?></small>
						<?php } ?>

						<?php if(get_field('leave_date_eight')){ ?>
							<small class="dt-end"><?php the_field('leave_date_eight'); ?></small>
						<?php } ?>
									
					</div> <!-- end dt-duration -->

					<?php if(get_field('affiliation_eight')){ ?>
						<h5 class="p-affiliation"><?php the_field('affiliation_eight'); ?></h5>
					<?php } ?>

					<?php if(get_field('experience_summary_eight')){ ?>					
						<p class="p-summary">
							<?php the_field('experience_summary_eight'); ?>
						</p>
					<?php } ?>
								
				</div> <!-- end expreince-content -->

		</div> <!-- end experience-wrap -->
					
	</div> <!-- end h-resume -->

	<?php } ?>	

	<?php endwhile; ?>		

</div> <!-- end single-wrap -->

<?php get_template_part('footer','blog'); 

get_footer(); ?>