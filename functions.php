<?php 

/*----------------------------------------
Nav Menu
----------------------------------------*/

function register_my_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}

add_action('init','register_my_menu');


/*----------------------------------------
Add Featured Image Support
----------------------------------------*/

add_theme_support('post-thumbnails');


/*----------------------------------------
HTML5 Support
----------------------------------------*/

add_theme_support('html5', array('search-form'));
