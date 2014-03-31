<?php
/**
 * Template Name: Work
 * Description: AJAX content for my portfolio
 *
 * @package WordPress
 * @subpackage Paint Style
 */
the_post();
$params = array(
	'orderby' => 'menu_order ASC',
	'limit'   => 16
);
$works = pods( 'work', $params );
 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->
</article><!-- #post-<?php the_ID(); ?> -->

<!-- Display work list -->
<div class="work-items">
	<?php echo $works->template( 'work_list' ); ?>
	<div class="work-page-nav ajax-item">
		<?php
			$pagvar = array(
				'next_text' => 'Next<span></span>',
				'prev_text' => '<span></span>Last',
				'type' => 'simple'
			);
			echo $works->pagination( $pagvar );
		?>
	</div>
</div>