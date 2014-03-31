<?php
/**
 * @package WordPress
 * @subpackage Paint Style
 */
?>
  <div class="clear"></div>
    <div class="footer">
		<?php
			$params = array(   
				'limit' => 1,
				'where' => 't.display_name = "benchirlin"'
				);

			$ben = pods( 'user', $params );
		?>
		
		<div class="social-links sixteen columns">
			<div class="wrapper">
			<?php if ( $ben->field('linkedin_page') ): ?>
				<a href="<?php  echo $ben->field('linkedin_page'); ?>" target="_blank" class="social-link linkedin" title="View <?php echo $ben->display('first_name'); ?>'s LinkedIn"><span></span>LinkedIn</a>
			<?php endif; ?>
			<?php if ( $ben->field('github_page') ): ?>
				<a href="<?php  echo $ben->field('github_page'); ?>" target="_blank" class="social-link github" title="View <?php echo $ben->display('first_name'); ?>'s Github"><span></span>Github</a>
			<?php endif; ?>
			<?php if ( $ben->field('twitter_page') ): ?>
				<a href="<?php  echo $ben->field('twitter_page'); ?>" target="_blank" class="social-link twitter" title="View <?php echo $ben->display('first_name'); ?>'s Twitter"><span></span>Twitter</a>
			<?php endif; ?>
			<a class="footer-logo" title="Benjamin Chirlin" href="<?php echo home_url(); //make logo a home link?>">Benjamin Chirlin</a>
			<?php if ( $ben->field('deviant_art_page') ): ?>
				<a href="<?php  echo $ben->field('deviant_art_page'); ?>" target="_blank" class="social-link deviantart" title="View <?php echo $ben->display('first_name'); ?>'s deviantART"><span></span>deviantART</a>
			<?php endif; ?>
			<?php if ( $ben->field('youtube_page') ): ?>
				<a href="<?php  echo $ben->field('youtube_page'); ?>" target="_blank" class="social-link youtube" title="View <?php echo $ben->display('first_name'); ?>'s Youtube"><span></span>Youtube</a>
			<?php endif; ?>
			<?php if ( $ben->field('instagram_page') ): ?>
				<a href="<?php  echo $ben->field('instagram_page'); ?>" target="_blank" class="social-link instagram" title="View <?php echo $ben->display('first_name'); ?>'s Instagram"><span></span>Instagram</a>
			<?php endif; ?>
			</div>
		</div>
    </div>
            
</div>                                            
<?php wp_footer(); ?>
   
</body>
</html>