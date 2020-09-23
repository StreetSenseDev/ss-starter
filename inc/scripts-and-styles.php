<?php


use QBStarter\AssetResolver;


add_action( 'wp_enqueue_scripts', function () {
	print_r(AssetResolver::resolve( 'css/app.6fc1af.css' ));

	// register custom fonts
	// wp_enqueue_style( 'qbstarter-fonts', 'https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300&display=swap');
	// wp_enqueue_style('qbstarter-fontawesome','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	// registers scripts and stylesheets
	wp_register_style( 'app-css', AssetResolver::resolve( 'css/app.css' ), [], false );
	wp_register_script( 'app-js', AssetResolver::resolve( 'js/app.js' ), [], false, true );

	// enqueue global assets
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script("jquery-effects-core");
	wp_enqueue_style( 'app-css' );
	wp_enqueue_script( 'app-js' );

} );

add_action( 'admin_enqueue_scripts', function ($hook) {
	if ( 'post.php' != $hook ) {
		return;
	}

	// register custom fonts
	// wp_enqueue_style( 'qbstarter-fonts', 'https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300&display=swap');
	// wp_enqueue_style('jsq2-2020-fontawesome','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	// registers scripts and stylesheets
	wp_register_style( 'admin-css', AssetResolver::resolve( 'css/admin.css' ), [], false );
	wp_register_script( 'admin-js', AssetResolver::resolve( 'js/admin.js' ), [], false, true );

	// enqueue global assets
	// wp_enqueue_script( 'jquery' );
	// wp_enqueue_script("jquery-effects-core");
	wp_enqueue_style( 'admin-css' );
	wp_enqueue_script( 'admin-js' );

} );