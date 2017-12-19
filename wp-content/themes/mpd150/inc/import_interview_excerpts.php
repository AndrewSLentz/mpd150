<?php

function import_excerpts() {
   // after all execution rename your file;
   rename( "1", "2" );
	echo('script run!');
}

add_action( 'wp_footer', 'import_excerpts' );