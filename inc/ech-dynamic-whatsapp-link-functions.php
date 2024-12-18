<?php
/**
 * Include file - Used in ECH_Dynamic_Whatsapp_Link_Plugin 
 * 
 * Contains: 
 * 
 * 
 * 
 * @link       https://primecare.com.hk/
 * @since      1.0.0 *
 * @package    ECH_Dynamic_Whatsapp_Link
 * 
 */


function register_dynamic_wtsapp_js(){
	wp_enqueue_script('dynamic_wtsapp_js', plugins_url('/assets/js/dynamic-whatsapp.js', __DIR__), array('jquery'), '1.0.0', true);
}

function enqueue_dynamic_wtsapp_js() {
	wp_enqueue_script( 'dynamic_wtsapp_js');
}


function dynamic_wtsapp_link_fun($atts){
	$paraArr = shortcode_atts( array(	
		'selector'	=> '.float_wtsapp a',   // default selector
		'default_r' => 't200',				// default tcode
		'default_link' => null,				// default whatsapp link
		'r' => null,						// tcode
		'links' => null						// whatsapp links 
	), $atts );


	if ($paraArr['selector'] == null) {
		return "<h4>Error - selector not specified</h4>";
	}
	if ($paraArr['default_link'] == null) {
		return "<h4>Error - default_link not specified</h4>";
	}
	if (($paraArr['r'] != null)&&$paraArr['links'] == null) {
		return "<h4>Error - links not specified</h4>";
	}
	if (($paraArr['links'] != null)&&$paraArr['r'] == null) {
		return "<h4>Error - r not specified</h4>";
	}

	$paraArr['r'] = array_map( 'trim', str_getcsv( $paraArr['r'], ',' ) );
	$paraArr['links'] = array_map( 'trim', str_getcsv( $paraArr['links'], ',' ) );

	if (count($paraArr['r']) != count($paraArr['links'])) {
		return "<h4>Error - r and links must be corresponding to each other</h4>";
	}

	$selector = htmlspecialchars($paraArr['selector']);
	$default_link = htmlspecialchars(str_replace(' ', '', $paraArr['default_link']));


	if(isset($_GET['r'])) {
		$get_r = $_GET['r'];
	} else {
		$get_r = "";
	}

	if(!empty($paraArr['r'][0])) {
		//$output .= "not empty <br>";
		if(in_array($get_r, $paraArr['r'])) {
			//get_r exist in array
			$key = array_search($get_r, $paraArr['r']);
			$r = $paraArr['r'][$key];
			$wtsapp_link = $paraArr['links'][$key];
			
		} else {
			$wtsapp_link = $default_link;
		}
	} else {
		$wtsapp_link = $default_link;
	}

	$output = '<div id="dynamic_wtsapp_info" data-selector="'.$selector.'" data-wtsapp-link="'.$wtsapp_link.'" style="display: none;"></div>';
	//$output .= 'link: ' . $wtsapp_link;


	return $output; 
}

