<?php 
/**
 * @package WordPress
 * @subpackage Paint Style
 */
?>
<?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
                
<article id="post-<?php the_ID(); ?>">
  <div class="title">            
     <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title('<h3>', '</h3>'); ?></a>
	 <h4> 
		<?php echo get_the_date(); ?>
      </h4>
	 <span class="paint-line"><span class="left-end"></span><span class="right-end"></span></span>
  </div>
     
    <?php the_content(); ?> <!--The Content-->
	<span class="paint-line"><span class="left-end"></span><span class="right-end"></span></span>
</article>
                
	
<?php endwhile; ?><!--  End the Loop -->

<?php /* Display navigation to next/previous pages when applicable */ ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>

  <nav id="nav-below">
    <div class="nav-previous"><?php next_posts_link('Next<span></span>'); ?></div>
    <div class="nav-next"><?php previous_posts_link('<span></span>Last'); ?></div>
  </nav><!-- #nav-below -->
  
<?php endif; ?>
  
<?php /* Only load comments on single post/pages*/ ?>
<?php if(is_page() || is_single()) : comments_template( '', true ); endif; ?>