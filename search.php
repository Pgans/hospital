<?php get_header(); ?>

	<div id="content" class="narrowcolumn">


	<div id="post_container">
	<?php if (have_posts()) : ?>

		<?php $i=0; while (have_posts()) : the_post(); $i++; ?>

			<div class="post" id="post-<?php the_ID(); ?>">
                <div class="post-top">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php if ( function_exists('the_title_attribute')) the_title_attribute(); else the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="post_comments"><p><?php comments_popup_link('0', '1', '%'); ?></p></div>
                </div>
				<div class="info">
					Posted on : <?php the_time('d-m-Y') ?> | By : <b><?php the_author() ?></b> | In : <span><?php the_category(', ') ?></span>
				</div>
				<?php if(function_exists('the_ratings')) { ?><div class="rate"><?php the_ratings();?></div><?php } ?> 
				<div class="entry">
					<?php if($i==1 || $i==2) : ?>
						<?php theme_google_468_ads_show(); ?>
					<? endif; ?>
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
				<div class="postmetadata">
					<a href="<?php the_permalink() ?>">Read Full Article</a>
				</div>
			</div>

		<?php endwhile; ?>
		
		<div class="entry">
			<?php theme_google_468_ads_show(); ?>
		</div>
	
		<?php 
		$next_page = get_next_posts_link('Previous'); 
		$prev_pages = get_previous_posts_link('Next');
		if(!empty($next_page) || !empty($prev_pages)) :
		?>
		<!-- navigation -->
		<div class="navigation">
			<?php if(!function_exists('wp_pagenavi')) : ?>
            <div class="alignleft"><?php next_posts_link('Previous') ?></div>
            <div class="alignright"><?php previous_posts_link('Next') ?></div>
            <?php else : wp_pagenavi(); endif; ?>
		</div>
		<!-- /navigation -->
		<?php endif; ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	</div>

	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>