<?php
include_once("metabox.class.php");
$highligts_metabox = redrokk_metabox_class::getInstance('highligts_metabox', array(
	'title'			=> 'Highlights',
	'description'	=> "Edit current post highlights. The content will not show on the page if you leave them blank. ",
	'_object_types'	=> 'post',
	'priority'		=> 'high',
	'_fields'		=> array(
			array(
				'name' 	=> 'Highlight One',
				'id' 	=> 'highlight-1',
				'type' 	=> 'textarea',
				
			),
			array(
				'name' 	=> 'Highlight Two',
				'id' 	=> 'highlight-2',
				'type' 	=> 'textarea',
				
			),
			array(
				'name' 	=> 'Highlight Three',
				'id' 	=> 'highlight-3',
				'type' 	=> 'textarea',
				
			),
		)
	));

function show_highlights($option = 'default'){
    

    $highlight1 = get_post_meta( get_the_ID(), 'highlight-1');
    $highlight2 = get_post_meta( get_the_ID(), 'highlight-2');
    $highlight2 = get_post_meta( get_the_ID(), 'highlight-3');
    
    // see if we could use the highlight
    if(empty($highlight1) && empty($highlight2) && empty($highlight3)){
        return ;
    }
    
    $highlights = compact('highlight1', 'highlight2', 'highligh3');
    //print_r($highlights);
    if('default' == $option){
        xj_print_highlights($highlights);
    }elseif ('widget' == $option){
        xj_print_highlights_widget($highlights);
    }
    
}	

function xj_print_highlights_widget($highlights = array()){
    if(empty($highlights)){
        return ;
    }
    $sharelink = get_permalink( get_the_ID() );
    
    foreach($highlights as $highlight){
        echo "<div class='highlight'><div class='highlight_content'>".$highlight[0].'</div>';
        echo '<div class="tweet-button"><a href="//twitter.com/share?url='.urlencode($sharelink).'&text='.urlencode($highlight[0]).'" target="_blank">Tweet</a></div>';
        echo '<div class="facebook-button"><a href="//www.facebook.com/sharer/sharer.php?u='.urlencode($sharelink).'&t='.urlencode($highlight[0]).'" target="_blank">Facebook Share</a></div>';
        echo "</div>";
        
    }
    
}
function xj_print_highlights($highlights = array()){
    if(empty($highlights)){
        return ;
    }
    $sharelink = get_permalink( get_the_ID() );
    echo "<div class='highlights'> <h3>Highlights</h3>";
    foreach($highlights as $highlight){
        echo "<div class='highlight'><div class='highlight_content'>".$highlight[0].'</div>';
        echo '<div class="tweet-button"><a href="//twitter.com/share?url='.urlencode($sharelink).'&text='.urlencode($highlight[0]).'" target="_blank">Tweet</a></div>';
        echo '<div class="facebook-button"><a href="//www.facebook.com/sharer/sharer.php?u='.urlencode($sharelink).'&t='.urlencode($highlight[0]).'" target="_blank">Facebook Share</a></div>';
        echo "</div>";
        
    }
    echo "</div>";
    
}



function xj_print_highlights_style() {
	wp_enqueue_style( 'highlights-style', XJ_HIGHLIGHTS_URL.'assets/css/style.css', false ); 
}

function xj_print_highlights_js() {
    wp_enqueue_script( 'facebook-js', '//connect.facebook.net/en_US/all.js', false);
	wp_enqueue_script( 'highlights-js', XJ_HIGHLIGHTS_URL.'assets/js/highlights.js', false );
}

add_action( 'wp_enqueue_scripts', 'xj_print_highlights_style' );
add_action( 'wp_enqueue_scripts', 'xj_print_highlights_js' );
?>