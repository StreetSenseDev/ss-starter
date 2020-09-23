<?php 

// Menu Time!
if ( !function_exists( 'register_qb_starter_menus' ) ) {
	function register_qb_starter_menus() {
		register_nav_menus(
			array(
				'left-menu' => __( 'Left Menu', 'qbstarter' ),
				'right-menu' => __( 'Right Menu', 'qbstarter' ),
				'hamburger-menu' => __( 'Hamburger  Menu', 'qbstarter' ),
				'footer-menu-1' => __( 'Footer  Menu 1', 'qbstarter' )
		  )
		);
	}
	add_action( 'init', 'register_qb_starter_menus' );

}