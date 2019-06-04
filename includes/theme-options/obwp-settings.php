<?
/**
 * @package WordPress
 * @subpackage magazine_obsession
 */

/**
 * Show the General Settings for Admin oanel
 *
 * @since 2.7.0
 *
 */
function obwp_general_settings()
{
    global $themename, $options;

	$options = array (
				array(	"name" => "General Settings",
						"type" => "heading"),
						
				array(	"name" => "Google Adsense ID",
						"desc" => "Enter google adnsense id. Example: pub-################. Enter pub- too.<br /><br />",
			    		"id" => SHORTNAME."_google_id",
			    		"std" => "",
			    		"type" => "text"),
						
				array(	"name" => "No. of 125x125 Ads",
						"desc" => "Enter count of 125x125 banner blocks.<br /><br />",
			    		"id" => SHORTNAME."_count_banner_125_125",
			    		"std" => "",
			    		"type" => "text"),
						
				array(	"name" => "Twitter ID",
						"desc" => "Enter twitter id.<br /><br />",
			    		"id" => SHORTNAME."_twitter_id",
			    		"std" => "",
			    		"type" => "text"),
						
				array(	"name" => "Stumble URL",
						"desc" => "Enter stuble url.<br /><br />",
			    		"id" => SHORTNAME."_stuble_id",
			    		"std" => "",
			    		"type" => "text"),
						
				array(	"name" => "Facebook URL",
						"desc" => "Enter facebook url.<br /><br />",
			    		"id" => SHORTNAME."_facebook_id",
			    		"std" => "",
			    		"type" => "text"),
						
				array(	"name" => "Digg URL",
						"desc" => "Enter digg url.<br /><br />",
			    		"id" => SHORTNAME."_digg_id",
			    		"std" => "",
			    		"type" => "text"),
						
				array(	"name" => "Flickr URL",
						"desc" => "Enter flickr url.<br /><br />",
			    		"id" => SHORTNAME."_flickr_id",
			    		"std" => "",
			    		"type" => "text"),
																														
		  );
	
	obwp_add_admin('obwp-settings.php');
}



?>