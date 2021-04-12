<?php 

// Menu Time!
if ( !function_exists( 'register_qb_starter_menus' ) ) {
	function register_qb_starter_menus() {
		register_nav_menus(
			array(
				'left-menu' => __( 'Left Menu', 'qb-starter' ),
				'right-menu' => __( 'Right Menu', 'qb-starter' ),
				'hamburger-menu' => __( 'Hamburger  Menu', 'qb-starter' ),
				'footer-menu-1' => __( 'Footer  Menu 1', 'qb-starter' )
		  )
		);
	}
	add_action( 'init', 'register_qb_starter_menus' );

}