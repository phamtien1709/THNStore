<?php
/**
 * Editorial Plus functions.
 *
 * @package Editorial
 * @subpackage Editorial Plus
 * 
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/


//google fonts
function editorial_plus_fonts_url(){
	$fonts_url = '';

	$editorial_plus_archivo = _x( 'on', 'Archivo: on or off', 'editorial-plus' );


	if ( 'off' !== $editorial_plus_archivo ) {

		$font_families = array();

		if ( 'off' !== $editorial_plus_archivo ) {
				$font_families[] = 'Archivo:300,400,400i,700,700i,800';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );

}



/**
 * Managed the theme default color
 */
function editorial_plus_customize_register( $wp_customize ) {
	global $wp_customize;

	$wp_customize->get_setting( 'editorial_theme_color' )->default = '#4DCAF9';

}

add_action( 'customize_register', 'editorial_plus_customize_register', 20 );


/*------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 */

add_action( 'wp_enqueue_scripts', 'editorial_plus_scripts', 99 );

function editorial_plus_scripts() {

    $editorial_plus_version = '1.0.0';


    //google fonts
    wp_enqueue_style( 'editorial-plus-fonts', editorial_plus_fonts_url(), array(), null );

    wp_dequeue_style( 'editorial-style' );
    
    wp_dequeue_style( 'editorial-responsive-style' );
    
    wp_enqueue_style( 'editorial-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $editorial_plus_version ) );
    
    wp_enqueue_style( 'editorial-parent-responsive', get_template_directory_uri() . '/assets/css/editorial-responsive.css', array(), esc_attr( $editorial_plus_version ) );

    wp_enqueue_style( 'editorial-plus-style', get_stylesheet_uri(), array(), esc_attr( $editorial_plus_version ) );

    wp_enqueue_script( 'theia-sticky-sidebar', get_stylesheet_directory_uri() . '/js/stickysidebar/theia-sticky-sidebar.js', array( 'jquery' ), '1.4.0', true );

    wp_enqueue_script( 'editorial-plus-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '', true );


 	$get_categories = get_categories( array( 'hide_empty' => 1 ) );

    $editorial_plus_theme_color = esc_attr( get_theme_mod( 'editorial_theme_color', '#4DCAF9' ) );
    $editorial_plus_theme_hover_color = editorial_hover_color( $editorial_plus_theme_color, '-50' );
       
        $output_css = '';

        foreach( $get_categories as $category ){

            $cat_color = esc_attr( get_theme_mod( 'editorial_category_color_'.strtolower( $category->name ), '#4DCAF9' ) );
            $cat_hover_color = esc_attr( editorial_hover_color( $cat_color, '-50' ) );
            $cat_id = esc_attr( $category->term_id );
            
            if( !empty( $cat_color ) ) {
                $output_css .= ".category-button.mt-cat-".$cat_id." a { background: ". $cat_color ."}\n";

                $output_css .= ".category-button.mt-cat-".$cat_id." a:hover { background: ". $cat_hover_color ."}\n";

                $output_css .= ".block-header.mt-cat-".$cat_id." { border-left: 2px solid ".$cat_color." }\n";

                $output_css .= ".rtl .block-header.mt-cat-".$cat_id." { border-left: none; border-right: 2px solid ".$cat_color." }\n";
                 
                $output_css .= ".archive .page-header.mt-cat-".$cat_id." { border-left: 4px solid ".$cat_color." }\n";

                $output_css .= ".rtl.archive .page-header.mt-cat-".$cat_id." { border-left: none; border-right: 4px solid ".$cat_color." }\n";

                $output_css .= "#site-navigation ul li.mt-cat-".$cat_id." { border-bottom-color: ".$cat_color." }\n";
            }
        }

        $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.edit-link .post-edit-link ,.reply .comment-reply-link,.home-icon,.search-main,.header-search-wrapper .search-form-main .search-submit,.mt-slider-section .bx-controls a:hover,.widget_search .search-submit,.error404 .page-title,.archive.archive-classic .entry-title a:after,#mt-scrollup,.widget_tag_cloud .tagcloud a:hover,.sub-toggle,#site-navigation ul > li:hover > .sub-toggle, #site-navigation ul > li.current-menu-item .sub-toggle, #site-navigation ul > li.current-menu-ancestor .sub-toggle,.ticker-content-wrapper .bx-controls a:hover{ background:". $editorial_plus_theme_color ."}\n";

        $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.widget_search .search-submit,.widget_tag_cloud .tagcloud a:hover,.ticker-content-wrapper .bx-controls a:hover{ border-color:". $editorial_plus_theme_color ."}\n";

        $output_css .= ".comment-list .comment-body ,.header-search-wrapper .search-form-main{ border-top-color:". $editorial_plus_theme_color ."}\n";

        $output_css .= "#site-navigation ul li,.header-search-wrapper .search-form-main:before{ border-bottom-color:". $editorial_plus_theme_color ."}\n";

        $output_css .= ".archive .page-header,.block-header, .widget .widget-title-wrapper, .related-articles-wrapper .widget-title-wrapper{ border-left-color:". $editorial_plus_theme_color ."}\n";

        $output_css .= "a,a:hover,a:focus,a:active,.entry-footer a:hover,.comment-author .fn .url:hover,#cancel-comment-reply-link,#cancel-comment-reply-link:before, .logged-in-as a,.top-menu ul li a:hover,#footer-navigation ul li a:hover,#site-navigation ul li a:hover,#site-navigation ul li.current-menu-item a,.mt-slider-section .slide-title a:hover,.featured-post-wrapper .featured-title a:hover,.editorial_block_grid .post-title a:hover,.slider-meta-wrapper span:hover,.slider-meta-wrapper a:hover,.featured-meta-wrapper span:hover,.featured-meta-wrapper a:hover,.post-meta-wrapper > span:hover,.post-meta-wrapper span > a:hover ,.grid-posts-block .post-title a:hover,.list-posts-block .single-post-wrapper .post-content-wrapper .post-title a:hover,.column-posts-block .single-post-wrapper.secondary-post .post-content-wrapper .post-title a:hover,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.entry-title a:hover,.entry-meta span a:hover,.post-readmore a:hover,.archive-classic .entry-title a:hover,
            .archive-columns .entry-title a:hover,.related-posts-wrapper .post-title a:hover,.block-header .block-title a:hover,.widget .widget-title a:hover,.related-articles-wrapper .related-title a:hover { color:". $editorial_plus_theme_color ."}\n";

        $refine_output_css = editorial_css_strip_whitespace( $output_css );

        wp_add_inline_style( 'editorial-plus-style', $refine_output_css );


}


/*
 * Add new social icon widget
 *
 */

 require get_stylesheet_directory() . '/editorial-plus-widgets/editorial-plus-social-icons.php';
 