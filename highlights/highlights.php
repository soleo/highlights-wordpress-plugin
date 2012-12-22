<?php
/*
Plugin Name: Highlights
Plugin URI: http://dev.shaosidea.com/highlights-plugin
Description: Description: Adds a highlights box with social plugin to your theme, and lets you highlight your posts
Author: Soleo Shao
Author URI: http://shaosidea.com/
Version: 1.0


    Highlights is released under the GNU General Public License (GPL)
    http://www.gnu.org/licenses/gpl.txt

    
*/
define('XJ_HIGHLIGHTS_DIR', plugin_dir_path(__FILE__));
define('XJ_HIGHLIGHTS_URL', plugin_dir_url(__FILE__));
function xj_highlights_load(){
		
    if(is_admin()) //load admin files only in admin
        require_once(XJ_HIGHLIGHTS_DIR.'includes/admin.php');
        
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

require_once('Widget.php');
?>