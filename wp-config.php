<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'thn_store' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '40ODs87JyJMK[TH{@PI0|pzUl_T<2* ZNsl~8iZ#A<_?&E$SOIz1ae9);p97wArB' );
define( 'SECURE_AUTH_KEY',  '*4Oa!GIX`E}IL8Hkvt{;_;651#wRrv1l0e3}CR%L1B!9Pt1tx^s_/F !;XTQ]Vrk' );
define( 'LOGGED_IN_KEY',    'mm8(y%Ps(%Wcmvv;Ea#,;U2O0GgNY62=QeF[E=I1gn&&<:a`jX^,6>tBc9iR+4Fd' );
define( 'NONCE_KEY',        'k>AuYWl<0e{v?u_r`x%jn1s5kD=Hdq>OOzvdQ(@69Y-n|z`D7}[%yU;9yIdw7a{U' );
define( 'AUTH_SALT',        '33OSmofn{/,#_m0P>Y%5c)i9rjxB>;[#y Hi[=an:Hmgdrm(ANX:+d9 <63s70&r' );
define( 'SECURE_AUTH_SALT', 'svTt|T)?g}{M;8i-kK=o|CTZ)c$]O+_]Ixl:jJSXNxE,B?N[{DJl;hp$jpXp|Avs' );
define( 'LOGGED_IN_SALT',   'v<oN)4&|( vrGKHCe-jW7NkIc`YOnqsHC!%y>oBPo%MF-eL/>C!-(=KU%79HbaH%' );
define( 'NONCE_SALT',       'd<[0ed^<6F?>ts#s9I|N[!ZiZyHP|.>#e*y.;wMB#@pK/YrOf8Mk;A%47l|wD*dl' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
