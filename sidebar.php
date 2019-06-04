	<div id="sidebar">
		<div id="sidebar_twitter">
			<?php $twitter_id = obwp_get_meta(SHORTNAME."_twitter_id"); ?>
			<h2><a href="http://www.twitter.com/<?php echo $twitter_id; ?>">Follow us on twitter</a></h2>
			<ul id="twitter_update_list"><li>&nbsp;</li></ul>
		</div>
		<div id="sidebar_search">
			<form method="get" action="<?php bloginfo('url'); ?>/">
				<div>
					<input type="text" value="Type your search here..." name="s" id="sidebar_search_val" onclick="this.value='';" />
					<input type="image" src="<?php bloginfo('template_url')?>/images/button_go.gif" id="sidebar_search_sub" />
				</div>
			</form>
		</div>
		<div id="sidebar_social">
			<ul>
				<?php $stuble_id = obwp_get_meta(SHORTNAME."_stuble_id"); if(!empty($stuble_id)) : ?>
				<li><a href="<?php echo $stuble_id; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/button_stuble.png" alt="stuble" /></a></li>
				<?php endif; ?>
				<li><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/button_rss.png" alt="rss" /></a></li>
				<?php $facebook_id = obwp_get_meta(SHORTNAME."_facebook_id"); if(!empty($facebook_id)) : ?>
				<li><a href="<?php echo $facebook_id; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/button_facebook.png" alt="facebook" /></a></li>
				<?php endif; ?>
				<?php $digg_id = obwp_get_meta(SHORTNAME."_digg_id"); if(!empty($digg_id)) : ?>
				<li><a href="<?php echo $digg_id; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/button_digg.png" alt="digg" /></a></li>
				<?php endif; ?>
				<?php $flickr_id = obwp_get_meta(SHORTNAME."_flickr_id"); if(!empty($flickr_id)) : ?>
				<li><a href="<?php echo $flickr_id; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/button_flickr.png" alt="flickr" /></a></li>
				<?php endif; ?>
			</ul>
		</div>
		<div id="sidebar_ads">
			<div id="sidebar_ads_body"><?php theme_ads_show() ?></div>
		</div>
		<div id="sidebar_left" class="sidebar_widgets">
			<ul>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ){
				?>
				<?
				} else { ?>	
				
				<li class="widget_categories">
					<h2 class="widgettitle">Category</h2>
					<ul>
						<?php wp_list_cats('sort_column=name&optioncount=1'); ?>
					</ul>
				</li>	
				
				<li class="widget_recent_entries">
					<h2 class="widgettitle">recent posts</h2>
					<?php obwp_list_recent_posts(5); ?>
				</li>
				
			<?php } ?>
			</ul>
		</div>
		<div id="sidebar_right" class="sidebar_widgets">
			<ul>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ){
				?>
				<?
				} else { ?>		
	
				<li class="widget_archives">
					<h2 class="widgettitle">Archives</h2>
					<ul>
					<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>
	
				<li class="widget_links">
					<h2 class="widgettitle">Partner Links</h2>
					<ul>
					<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
					</ul>
				</li>
				
			<?php } ?>
			</ul>
		</div>
	</div>

