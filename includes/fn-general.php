<?php
/**
 * @package WordPress
 * @subpackage magazine_obsession
 */

/* Get ID of the page, if this is current page */

function obwp_get_page_id () {
	global $wp_query;

	if ( !$wp_query->is_page )
		return -1;

	$page_obj = $wp_query->get_queried_object();

	if ( isset( $page_obj->ID ) && $page_obj->ID >= 0 )
		return $page_obj->ID;

	return -1;
}

/**
 * Get Meta post/pages value
 * $type = string|int
 */
function obwp_get_meta($var, $type = 'string', $count = 0)
{
	$value = stripslashes(get_option($var));
	
	if($type=='string')
	{
		return $value;
	}
	elseif($type=='int')
	{
		$value = intval($value);
		if( !is_int($value) || $value <=0 )
		{
			$value = $count;
		}
		
		return $value;
	}
	
	return NULL;
}

/**
 * Get custom field of the current page
 * $type = string|int
 */
function obwp_getcustomfield($filedname, $page_current_id = NULL)
{
	if($page_current_id==NULL)
		$page_current_id = obwp_get_page_id();

	$value = get_post_meta($page_current_id, $filedname, true);

	return $value;
}
function the_title_limited($length = false, $before = '', $after = '', $echo = true)
{
	$title = get_the_title();

	if ( $length && is_numeric($length) )
	{
		$title = substr( $title, 0, $length );
	}
	if ( strlen($title)> 0 )
	{
		$title = apply_filters('the_title2', $before . $title . $after, $before, $after);
		if ( $echo )
			echo $title;
		else
			return $title;
	}
}

function the_content_limit($max_char, $more_link_text = '', $use_p = false, $stripteaser = 0, $more_file = '')
{
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
	  if($use_p)
      	echo "<p>";
      echo $content;
	  if($use_p)
      	echo "</p>";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
	  	if($use_p)
       		echo "<p>";
        echo $content;
        echo "...";
	  	if($use_p)
        	echo "</p>";
   }
   else {
	  if($use_p)
      	echo "<p>";
      echo $content;
	  if($use_p)
      	echo "</p>";
   }
}

 
function theme_ads_show()
{
	global $shortname;
	$count = obwp_get_meta(SHORTNAME."_count_banner_125_125",'int');
	$count_real = 0;
	if($count>0)
	{
		for($i=1; $i<=$count; $i++)
		{
			$banner_url = obwp_get_meta(SHORTNAME.'_banner_125_125_url_'.$i);
			$banner_img = obwp_get_meta(SHORTNAME.'_banner_125_125_img_'.$i);
			$banner_title = obwp_get_meta(SHORTNAME.'_banner_125_125_title_'.$i);

			if(!empty($banner_url) && !empty($banner_img))
			{
				$count_real++;
			?><div><a href="<?php echo $banner_url; ?>" title="<?php echo $banner_title; ?>"><img src="<?php echo $banner_img; ?>" alt="<?php echo $banner_title; ?>" /></a></div><?php
			}
		}
	}
	else
	{
		$count = 4;
	}
	if($count_real<1 && $count>=1)
	{
		?><div><a href="http://www.askthemes.com/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ads_at.jpg" alt="AskThemes.com" /></a></div><?php
	}
	if($count_real<2 && $count>=2)
	{
		?><div><a href="http://www.wpize.me/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ads_wp.jpg" alt="PSD to Wordpress" /></a></div><?php
	}
	if($count_real<3 && $count>=3)
	{
		?><div><a href="http://www.niftyxhtml.com/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/nx.png" alt="PSD to Xhtml" /></a></div><?php
	}
	if($count_real<4 && $count>=4)
	{
		?><div><a href="http://www.skinpress.com/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/skinpress-125x125.png" alt="Free Wordpress Themes" /></a></div><?php
	}
}

function theme_google_468_ads_show()
{
	$id = obwp_get_meta(SHORTNAME."_google_id");
	if(!empty($id))
	{
		echo $code = '<div class="banner"><script type="text/javascript"><!--
google_ad_client = "'.$id.'";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text_image"; 
google_color_border = "666666";
google_color_bg = "ffffff";
google_color_link = "f26521";
google_color_url = "f26521";
google_color_text = "333333"; 
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>';
	}
}

function theme_google_300_ads_show()
{
	$id = obwp_get_meta(SHORTNAME."_google_id");
	if(!empty($id))
	{
		echo $code = '<div class="banner_left"><script type="text/javascript"><!--
google_ad_client = "'.$id.'";
google_ad_width = 300;
google_ad_height = 250;
google_ad_format = "300x250_as";
google_ad_type = "text_image"; 
google_color_border = "c5c5c5";
google_color_bg = "ffffff";
google_color_link = "9d080d";
google_color_url = "9d080d";
google_color_text = "000000"; 
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>';
	}
}

function get_string_limit($output, $max_char)
{
    $output = str_replace(']]>', ']]&gt;', $output);
    $output = strip_tags($output);

  	if ((strlen($output)>$max_char) && ($espacio = strpos($output, " ", $max_char )))
	{
        $output = substr($output, 0, $espacio).'...';
		return $output;
   }
   else
   {
      return $output;
   }
}

function wp_list_pages2($args) {
	$defaults = array(
		'depth' => 0, 'show_date' => '',
		'date_format' => get_option('date_format'),
		'child_of' => 0, 'exclude' => '',
		'title_li' => __('Pages'), 'echo' => 1,
		'authors' => '', 'sort_column' => 'menu_order, post_title',
		'link_before' => '', 'link_after' => ''
	);

	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );

	$output = '';
	$current_page = 0;

	// sanitize, mostly to keep spaces out
	$r['exclude'] = preg_replace('/[^0-9,]/', '', $r['exclude']);

	// Allow plugins to filter an array of excluded pages
	$r['exclude'] = implode(',', apply_filters('wp_list_pages_excludes', explode(',', $r['exclude'])));

	// Query pages.
	$r['hierarchical'] = 0;
	$pages = get_pages($r);

	if ( !empty($pages) ) {
		if ( $r['title_li'] )
			$output .= '<li class="pagenav">' . $r['title_li'] . '<ul>';

		global $wp_query;
		if ( is_page() || $wp_query->is_posts_page )
			$current_page = $wp_query->get_queried_object_id();
		$output .= walk_page_tree($pages, $r['depth'], $current_page, $r);

		if ( $r['title_li'] )
			$output .= '</ul></li>';
	}

	$output = apply_filters('wp_list_pages', $output);

	if ( $r['echo'] )
		echo $output;
	else
		return $output;
}

function obwp_list_most_commented($no_posts = 5, $before = '<li>', $after = '</li>', $show_pass_post = false, $duration=''){
    global $wpdb;
	
	$list_most_commented = wp_cache_get('list_most_commented');
	if ($list_most_commented === false) {
		$request = "SELECT ID, post_title, post_content, comment_count FROM $wpdb->posts";
		$request .= " WHERE post_status = 'publish'";
		if (!$show_pass_post) $request .= " AND post_password =''";
	
		if ($duration !="") $request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
	
		$request .= " ORDER BY comment_count DESC LIMIT $no_posts";
		$posts = $wpdb->get_results($request);

		if ($posts) {
			foreach ($posts as $post) {
				$post_title = htmlspecialchars($post->post_title);
				$comment_count = $post->comment_count;
				$post_content = $post->post_content;
				$permalink = get_permalink($post->ID);
				$list_most_commented .= $before . '<a href="' . $permalink . '" title="' . $post_title.'">' . $post_title . '</a> (' . $comment_count.')<p>'.get_string_limit($post_content, 70).'</p>' . $after;
			}
		} else {
			$list_most_commented .= $before . "None found" . $after;
		}
	
		wp_cache_set('list_most_commented', $list_most_commented);
	} 

    echo $list_most_commented;
}


function obwp_list_recent_posts($number = 10) {

	$posts = get_posts('cat='.EXCEPT_CAT.'&orderby=date&numberposts='.$number);
	
	?>
    <ul>
    <?
	$countposts = count($posts);
	for($i=0; $i<$countposts; $i++)
	{
		?>
        	<li <?php if($i==($countposts-1)) echo 'class="last"'; ?>><a href="<?=get_permalink($posts[$i]->ID)?>"><?=$posts[$i]->post_title?></a></li>
        <?
	}
	?>
    </ul>
    <?

}

/***********************************************************************/
/* CUSTOM FIELDS */
/*
	thumbnail = for top carusel
*/
/***********************************************************************/


function carousel_featured_posts($max_posts=5, $offset=0) {
	if(!function_exists('show_featured_posts'))
		return false;
		
	global $wpdb, $table_prefix;
	$table_name = $table_prefix."features";
	
	$sql = "SELECT * FROM $table_name ORDER BY date DESC LIMIT $offset, $max_posts";
	$posts = $wpdb->get_results($sql);
	
	$html = '';
	$coint_i = 0;
	foreach($posts as $post) {
		$coint_i++;
		$id = $post->id;
		$posts_table = $table_prefix.'posts'; 
		$sql_post = "SELECT * FROM $posts_table where id = $id";
		$rs_post = $wpdb->get_results($sql_post);
		$data = $rs_post[0];
		$post_title = stripslashes($data->post_title);
		$post_title = str_replace('"', '', $post_title);
		$post_content = stripslashes($data->post_content);
		$post_content = str_replace(']]>', ']]&gt;', $post_content);
		$post_content = strip_tags($post_content);
		$permalink = get_permalink($data->ID);
		$post_id = $data->ID;
		$html .= '<div class="board_item">
			<!-- board_item -->
			<p>';
			
		$thumbnail = get_post_meta($post_id, 'thumbnail', true);
		
		if( isset($thumbnail) && !empty($thumbnail) ):
			$html .= '<img src="'.$thumbnail.'" alt="'.$post_title.'" />';
		endif;
		
		$html .= '<strong><a href="'.$permalink.'">'.get_string_limit($post_title,50).'</a></strong> '.get_string_limit($post_content,300).'</p>
			<p class="more"><a href="'.$permalink.'">Read more</a></p>
			<!-- /board_item -->
		</div>';
	}
	echo $html;
	return $coint_i;
}

function theme_twitter_show($count=4)
{
	$id = obwp_get_meta(SHORTNAME."_twitter_id");
	if(!empty($id))
	{
	?>
	<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
	<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $id; ?>.json?callback=twitterCallback2&amp;count=<?php echo $count; ?>"></script>
	<?php
	}
}


### Function: Display Highest Rated Page/Post
if(!function_exists('theme_get_highest_rated') && function_exists('get_highest_rated')) {
	function theme_get_highest_rated($mode = '', $min_votes = 0, $limit = 10, $chars = 0, $display = true) {
		global $wpdb, $post;
		$temp_post = $post;
		$ratings_max = intval(get_option('postratings_max'));
		$ratings_custom = intval(get_option('postratings_customrating'));
		$output = '';
		if(!empty($mode) && $mode != 'both') {
			$where = "$wpdb->posts.post_type = '$mode'";
		} else {
			$where = '1=1';
		}
		if($ratings_custom && $ratings_max == 2) {
			$order_by = 'ratings_score';
		} else {
			$order_by = 'ratings_average';
		}
		if($chars > 0) {
			if($ratings_custom && $ratings_max == 2) {
				$temp = '<li><a href="%POST_URL%"\">%POST_TITLE%</a> %RATINGS_ALT_TEXT%</li>';
			} else {
				$temp = '<li><a href="%POST_URL%"\">%POST_TITLE%</a> %RATINGS_IMAGES%</li>';
			}
		} else {
			$temp = stripslashes(get_option('postratings_template_highestrated'));
		}
		$highest_rated = $wpdb->get_results("SELECT DISTINCT $wpdb->posts.*, (t1.meta_value+0.00) AS ratings_average, (t2.meta_value+0.00) AS ratings_users, (t3.meta_value+0.00) AS ratings_score FROM $wpdb->posts LEFT JOIN $wpdb->postmeta AS t1 ON t1.post_id = $wpdb->posts.ID LEFT JOIN $wpdb->postmeta As t2 ON t1.post_id = t2.post_id LEFT JOIN $wpdb->postmeta AS t3 ON t3.post_id = $wpdb->posts.ID WHERE t1.meta_key = 'ratings_average' AND t2.meta_key = 'ratings_users' AND t3.meta_key = 'ratings_score' AND $wpdb->posts.post_password = '' AND $wpdb->posts.post_date < '".current_time('mysql')."' AND $wpdb->posts.post_status = 'publish' AND t2.meta_value >= $min_votes AND $where ORDER BY $order_by DESC, ratings_users DESC LIMIT $limit");
		if($highest_rated) {
			foreach($highest_rated as $post) {
				
				//$output .= expand_ratings_template($temp, $post->ID, $post, $chars)."\n";
				$post_content = $post->post_content;
				$temp_new = '<a href="%POST_URL%">%POST_TITLE%</a> %RATINGS_IMAGES%';
				$output .= '<li>'.expand_ratings_template($temp_new, $post->ID, $post, $chars).' <p>'.get_string_limit($post_content, 70).'</p></li>';
			}
		} else {
			$output = '<li>'.__('N/A', 'wp-postratings').'</li>'."\n";
		}
		$post = $temp_post;
		if($display) {
			echo $output;
		} else {
			return $output;
		}
	}
}


### Function: Display Most Viewed Page/Post
if(!function_exists('theme_get_most_viewed') && function_exists('get_most_viewed')) {
	function theme_get_most_viewed($mode = '', $limit = 10, $chars = 0, $display = true) {
		global $wpdb, $post;
		$views_options = get_option('views_options');
		$where = '';
		$temp = '';
		$output = '';
		if(!empty($mode) && $mode != 'both') {
			$where = "post_type = '$mode'";
		} else {
			$where = '1=1';
		}
		$most_viewed = $wpdb->get_results("SELECT DISTINCT $wpdb->posts.*, (meta_value+0) AS views FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.post_id = $wpdb->posts.ID WHERE post_date < '".current_time('mysql')."' AND $where AND post_status = 'publish' AND meta_key = 'views' AND post_password = '' ORDER  BY views DESC LIMIT $limit");
		if($most_viewed) {
			foreach ($most_viewed as $post) {
				$post_views = intval($post->views);
				$post_title = get_the_title();
				$post_excerpt = views_post_excerpt($post->post_excerpt, $post->post_content, $post->post_password);
				$post_content = get_the_content();
				if($chars > 0) {				
					$temp = "<li><a href=\"".get_permalink()."\">".snippet_text($post_title, $chars)."</a> - ".sprintf(__ngettext('%s view', '%s views', $post_views, 'wp-postviews'), number_format_i18n($post_views))."</li>\n";
				} else {
					$temp = stripslashes($views_options['most_viewed_template']);
					$temp = str_replace("%VIEW_COUNT%", number_format_i18n($post_views), $temp);
					$temp = str_replace("%POST_TITLE%", $post_title, $temp);
					$temp = str_replace("%POST_EXCERPT%", $post_excerpt, $temp);
					$post_content = get_string_limit($post->post_content, 70);
					$temp = str_replace("%POST_CONTENT%", $post_content, $temp);
					$temp = str_replace("%POST_URL%", get_permalink(), $temp);
				}
				$output .= $temp;
			}			
		} else {
			$output = '<li>'.__('N/A', 'wp-postviews').'</li>'."\n";
		}
		if($display) {
			echo $output;
		} else {
			return $output;
		}
	}
}

?>