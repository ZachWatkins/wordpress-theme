<?php

/* Path to the WordPress codebase you'd like to test. Add a forward slash in the end. */
define( 'ABSPATH', dirname( __DIR__, 2 ) . '/src/' );

/*
 * Path to the theme to test with.
 *
 * The 'default' theme is symlinked from test/phpunit/data/themedir1/default into
 * the themes directory of the WordPress installation defined above.
 */
define( 'WP_DEFAULT_THEME', 'default' );

/*
 * Test with multisite enabled.
 * Alternatively, use the tests/phpunit/multisite.xml configuration file.
 */
// define( 'WP_TESTS_MULTISITE', true );

/*
 * Force known bugs to be run.
 * Tests with an associated Trac ticket that is still open are normally skipped.
 */
// define( 'WP_TESTS_FORCE_KNOWN_BUGS', true );

// Test with WordPress debug mode (default).
define( 'WP_DEBUG', true );

// ** MySQL settings ** //

/*
 * This configuration file will be used by the copy of WordPress being tested.
 * wordpress/wp-config.php will be ignored.
 *
 * WARNING WARNING WARNING!
 * These tests will DROP ALL TABLES in the database with the prefix named below.
 * DO NOT use a production database or one that is shared with something else.
 */

define( 'DB_NAME', 'testdb' );
define( 'DB_USER', 'admin' );
define( 'DB_PASSWORD', 'password' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 */
define( 'AUTH_KEY', ']VI!AL-:mIb7T+ta}[j459ZwK@5}Lo7URj8[K7%:Dhe`(O5HkIbFEV0{V5dqJ=DJ' );
define( 'SECURE_AUTH_KEY', '~_2fUDu;I|J[]1MqfPMY/NiJt{{/U!Jko~j% b<d%B5!F[Pp U*-BBc[/bA&xStS' );
define( 'LOGGED_IN_KEY', 'qyJl&um&U0$+v5KoCr<$o]uW=vloJE=Y(;[cBe9whc:-^fn%nNEk1@,Z,@@_]%qZ' );
define( 'NONCE_KEY', '1NRm+7rS5p2MZO`o?w.In(ZJ-Lak!jIy[+oanuyu@U7T@]Rp&5m0SEjiXJ|3/IG`' );
define( 'AUTH_SALT', '4~+pN=&)I!qAW$dBq@c|SUqAaX-,1rp@1E_*ZQL:f*ISN.zI%3m]wg HZY@bTcbj' );
define( 'SECURE_AUTH_SALT', '-|?%<3HGPk)dRu*rrz.@Tk1Lt$Zyg{4pu83bBkjf)dj)UKoNX/$=!5Oc6cYAluP<' );
define( 'LOGGED_IN_SALT', 'w]BN/^OU_]-|ru5?S]JN|dz3D$L`_0/sx7xgCDVCm7I^g%{<+aV_qym$/^=XOlqY' );
define( 'NONCE_SALT', 'ke.yj)|z2!]a7PngsnkP^Y+CyjBofcvShFKU|b%g6dR?JzkL,-|u+9O-Cl%-BDCw' );

$table_prefix = 'wptests_';   // Only numbers, letters, and underscores please!

define( 'WP_TESTS_DOMAIN', 'example.org' );
define( 'WP_TESTS_EMAIL', 'admin@example.org' );
define( 'WP_TESTS_TITLE', 'Test Blog' );

define( 'WP_PHP_BINARY', 'php' );

define( 'WPLANG', '' );
