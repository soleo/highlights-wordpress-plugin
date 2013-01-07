<?php
/*
Plugin Name: ReadyMadeWeb Highlights
Plugin URI: http://dev.shaosidea.com/highlights-plugin
Description: Description: Adds a highlights box with social plugin to your theme, and lets you show highlights in your posts
Author: ReadyMadeWeb
Author URI: http://www.ReadyMadeWeb.com
Version: 1.0


    Highlights is released under the GNU General Public License (GPL)
    http://www.gnu.org/licenses/gpl.txt

    
*/
define('HIGHLIGHTS_VERSION', '1.0');
define('XJ_HIGHLIGHTS_DIR', plugin_dir_path(__FILE__));
define('XJ_HIGHLIGHTS_URL', plugin_dir_url(__FILE__));
include_once("includes/metabox.class.php");
	$highlights_metabox = redrokk_metabox_class::getInstance('highlights_metabox', array(
	'title'			=> 'Highlights',
	'description'	=> "Edit current post highlights. The content will not show on the page if you leave them blank. ",
	'_object_types'	=> 'post',
	'priority'		=> 'high',
	'_fields'		=> array(
			array(
				'name' 	=> 'Highlight One',
				'id' 	=> 'highlight-1',
				'type' 	=> 'wpeditor',
				
			),
			array(
				'name' 	=> 'Highlight Two',
				'id' 	=> 'highlight-2',
				'type' 	=> 'wpeditor',
				
			),
			array(
				'name' 	=> 'Highlight Three',
				'id' 	=> 'highlight-3',
				'type' 	=> 'wpeditor',
				
			),
		)
	)); 
function xj_highlights_load(){
	
    if(is_admin()) //load admin files only in admin
        require_once(XJ_HIGHLIGHTS_DIR.'includes/admin.php');
        
    require_once(XJ_HIGHLIGHTS_DIR.'includes/plugin-options.php');
    require_once(XJ_HIGHLIGHTS_DIR.'includes/core.php');
  
}

xj_highlights_load();

register_activation_hook(__FILE__, 'xj_highlights_activation');
register_deactivation_hook(__FILE__, 'xj_highlights_deactivation');

function xj_highlights_activation() {
    
	//actions to perform once on plugin activation go here  
	
}
function xj_highlights_deactivation() {    
	// actions to perform once on plugin deactivation go here	    
}

// Display a Settings link on the main Plugins page
add_filter( 'plugin_action_links', 'xj_highlights_plugin_action_links', 10, 2 );
function xj_highlights_plugin_action_links( $links, $file ) {

	if ( $file == plugin_basename( __FILE__ ) ) {
		$xj_highlights_links = '<a href="'.get_admin_url().'options-general.php?page=highlights/includes/plugin-options.php">'.__('Settings').'</a>';
		// make the 'Settings' link appear first
		array_unshift( $links, $xj_highlights_links );
	}

	return $links;
}

require_once('Widget.php');
?>