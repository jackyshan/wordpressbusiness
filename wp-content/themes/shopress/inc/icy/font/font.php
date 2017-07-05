<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function shopress_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Abril Fatface:300,400,500,600,700','Poppins:300,400,500,600,700');
	
	
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return esc_url($fonts_url);
}
function shopress_scripts_styles() {
    wp_enqueue_style( 'shopress-fonts', shopress_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'shopress_scripts_styles' );
?>