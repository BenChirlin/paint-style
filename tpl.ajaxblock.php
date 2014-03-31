<?php
/**
 * Template Name: AJAX Block
 * Description: Raw block of content for AJAX page load
 *
 * @package WordPress
 * @subpackage Paint Style
 */
?>
<?php the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="page-inner">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->