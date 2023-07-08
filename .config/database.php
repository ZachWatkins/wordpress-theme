<?php

/**
 * Seed the database.
 *
 * @package WordPress Theme
 */

global $wpdb;

// Set option "seeded" to "true".
$seeded = get_option( 'seeded' );
if ( $seeded ) {
	echo "Database already seeded.\n";
	return;
}

update_option( 'seeded', true );
echo "Database seeded.\n";
