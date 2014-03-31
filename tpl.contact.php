<?php
/**
 * Template Name: Contact
 * Description: AJAX contact form
 *
 * @package WordPress
 * @subpackage Paint Style
 */
	the_post();
	get_header(); 
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title 
?>
<div class="home-content">
	<div class="three columns work-nav">
		<a href="/#work-1" title="See my work" class="inactive">
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
		<div class="five columns omega">
			<a href="/contact" title="Contact me" class="active">
				<div class="paint-box red nav">
					contact
				</div>
			</a>
		</div>
		
		<br clear="all" />
		<div class="contact-content">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
				<header class="entry-header">
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</header><!-- .entry-header -->

				<div class="page-inner">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->
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