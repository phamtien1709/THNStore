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
define( 'DB_NAME', 'thdatabase' );

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
define( 'AUTH_KEY',         '2V{6?sRVX^[542K#{LrY{H9Yfi<6<ebnIOE9kmP{Bg.PdLI qT^YM-=4M><#WCcN' );
define( 'SECURE_AUTH_KEY',  'Q</joSz.},Lf9!Vc(t) Re!}a7*@,OC$zxx3%23P`,Ma=Lg*%pV6AF^sYNNx!g[j' );
define( 'LOGGED_IN_KEY',    'a:xUGZbrU_vgejW}MH|0{]dSL4%r)d{CO|q5(R.Q:q;FQy6;+<XmAEDq6s98_K4?' );
define( 'NONCE_KEY',        '?]v9.{.x12g[l(VQZ 3cx5C:X2/Eh.<q=sQ(xdG[(v29KnD{|*P7nXKW_>5 +8nw' );
define( 'AUTH_SALT',        'xD@jJbkk,D;AVTEAcgfz=v)bs*!fJ9c^J#@p8OSxTu^6f*6t$6XW&I2kA;([_n{s' );
define( 'SECURE_AUTH_SALT', '[ojcA] /f{QLkzD4{q]}=6/Wm4`VimoY{CoR~,ZTl=tyYL@7Yb^?UD9oc#xm0Zs>' );
define( 'LOGGED_IN_SALT',   ')&ik?IhJxF%hi=Ndf1=L3aO8_iEbDO[1=!sIHx*D6n+lVE&yl,{urd>!/:;_je7P' );
define( 'NONCE_SALT',       ' wWA$8.]Q2HZBet@H?KmpmzGS=wlu-kbXe3x`GERKg%@-Db{(j&8m7Z%~[o/pB!q' );

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
