<?php
/**
 * Template Name: Work Piece
 * Description: One piece of work content
 *
 * @package WordPress
 * @subpackage Paint Style
 */

global $pods;
?>

<?php
	get_header(); 
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title 
?>
<div class="home-content">
	<div class="three columns work-nav">
		<a href="/#work-1" title="See my work" class="active">
			<div class="paint-box blue tall-nav nav">
				work <span class="menu-img brush"></span>
			</div>
		</a>
	</div>
	<div class="three columns blog-nav mobile">
		<a href="/#blog-1" title="See my blog" class="inactive">
			<div class="paint-box yellow tall-nav nav">
				blog <span class="menu-img pencil"></span>
			</div>
		</a>
	</div>
	<div class="ten columns">
		<div class="five columns alpha ajax-nav">
			<a href="/#about" title="Find out about me">
				<div class="paint-box red nav ajax-page">
					about
				</div>
			</a>
		</div>
		<div class="five columns omega ajax-nav">
			<a href="/contact" title="Contact me">
				<div class="paint-box red nav">
					contact
				</div>
			</a>
		</div>
		
		<br clear="all" />
		<div class="work-content">
			<article id="post-<?php echo $pods->field('permalink'); ?>">
				<div class="title">
					<?php if( $pods->field('project_link') ): ?>
						<a href="<?php echo $pods->field('project_link'); ?>" target="_blank"><h3><?php echo $pods->field('name'); ?></h3></a>
					<?php else: ?>
						<h3><?php echo $pods->field('name'); ?></h3>
					<?php endif; ?>
					<h4><?php echo $pods->field('project_subheader'); ?></h4>
					<span class="paint-line"><span class="left-end"></span><span class="right-end"></span></span>
				</div>
				<?php
					the_post();
					the_content();
					
					// If more than one image in images, create slideshow, else print first image (or nothing)
					$slides = $pods->field('project_slideshow');
					if ( !empty($slides) && count($slides) > 1 ) {
				?>
					<div class="slider-container">
						<div class="slider" data-cycle-center-horz=true data-cycle-center-vert=true data-cycle-auto-height="calc">
							<?php foreach($slides as $key=>$slide) { ?>
								<div class="slide">
									<?php
										$res = wp_get_attachment_image_src($slide['ID'], 'medium');
										$src = '';
										if (!empty($res)) {
											$src = $res[0];
										} else {
											$src = wp_get_attachment_url($slide['ID']);
										}
									?>
									<img src="<?php echo $src; ?>" />
									<span class="img-caption"><?php echo $slide['post_title']; ?></span>
								</div>
							<?php } ?>
						</div>
						<span class="slide-nav next">Next</span>
						<span class="slide-nav last">Last</span>
					</div>
					<!--
			<div class="slidercontrol">
						<span href="#prev" title="Previous" class="prev">Previous</span>
						<span class="thumbs"></span>
						<span href="#next" title="Next" class="next">Next</span>
					</div>
			-->
				<?php } elseif( !empty($slides) && count($slides) == 1 ) { ?>
					<div class="work-image">
						<?php
							$res = wp_get_attachment_image_src(array_shift($pods->field('project_slideshow.ID')), 'medium');
							$src = '';
							if (!empty($res)) {
								$src = $res[0];
							} else {
								$src = wp_get_attachment_url(array_shift($pods->field('project_slideshow.ID')));
							}
						?>
						<?php if( $pods->field('project_link') ): ?>
							<a href="<?php echo $pods->field('project_link'); ?>" target="_blank"><img src="<?php echo $src; ?>" /></a>
						<?php else: ?>
							<img src="<?php echo $src; ?>" />
						<?php endif; ?>
					</div>
				<?php } else { ?>
					<!-- <h1>NO IMAGES</h1> -->
				<?php } ?>
				<?php
				if( $pods->field('project_description') ) {
					echo $pods->display('project_description');
				}
				?>
				<?php if( $pods->field('project_link') ): ?>
					<a href="<?php echo $pods->field('project_link'); ?>" target="_blank" class="work-link">View Project</a>
				<?php endif; ?>
			</article>
		</div>
    </div>
	<div class="three columns blog-nav nonmobile">
		<a href="/#blog-1" title="See my blog" class="inactive">
			<div class="paint-box yellow tall-nav nav">
				blog <span class="menu-img pencil"></span>
			</div>
		</a>
	</div>
</div>
<?php get_footer(); ?>