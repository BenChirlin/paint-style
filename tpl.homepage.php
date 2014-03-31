<?php
/**
 * Template Name: Homepage
 * Description: Three column homepage with basic about copy
 *
 * @package WordPress
 * @subpackage Paint Style
 */

get_header(); 
get_template_part( 'menu', 'index' ); //the  menu + logo/site title ?>
<div class="home-content">
	<div class="three columns work-nav">
		<a href="#work-1" title="See my work">
			<div class="paint-box blue tall-nav nav">
				work <span class="menu-img brush"></span>
			</div>
		</a>
	</div>
	<div class="three columns blog-nav mobile">
		<a href="#blog-1" title="See my blog">
			<div class="paint-box yellow tall-nav nav">
				blog <span class="menu-img pencil"></span>
			</div>
		</a>
	</div>
	<div class="ten columns">
		<div class="five columns alpha ajax-nav">
			<a href="#about" title="Find out about me">
				<div class="paint-box red nav ajax-page">
					about
				</div>
			</a>
		</div>
		<div class="five columns omega ajax-nav">
			<a href="contact" title="Contact me">
				<div class="paint-box red nav">
					contact
				</div>
			</a>
		</div>
		
		<br clear="all" />
		
		<div class="main-content">
			<?php the_post(); ?>
			<header class="entry-header">
				<h2 class="entry-title"><?php the_title(); ?></h2>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
		</div>
		<div class="blog-content"></div>
		<div class="work-content"></div>
		<div class="page-content"></div>
		<div class="ajax-loader">
			<div class="jax leftjax five columns alpha"></div>
			<div class="jax rightjax five columns omega"></div>
		</div>
    </div>
	<div class="three columns blog-nav nonmobile">
		<a href="#blog-1" title="See my blog">
			<div class="paint-box yellow tall-nav nav">
				blog <span class="menu-img pencil"></span>
			</div>
		</a>
	</div>
</div>
	<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
                
<?php get_footer(); ?>