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
define( 'DB_NAME', 'thriive' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'ngO^%8zpC]o3.HS5 1vm7@3HYY[^~IK:#Jd}N$}&:WY1q{f134uPv1*9b!@u&U$O' );
define( 'SECURE_AUTH_KEY',  ' jtn0ul,Y_t>#<VijjeZZgpd1M%on9G@@lqw~ d8Bk/7?^?HE[a[#%5fZr_Xl&v:' );
define( 'LOGGED_IN_KEY',    'Y!K3/{yl]b6.z;~N%7y1T|U}[fpD)qb4&nb(]4*4&lr3~8 BU=qaw?iie,B2MU@A' );
define( 'NONCE_KEY',        '%hlfxqi],C7v;#gjW+P^+%WM/,K/*G%&iUot3N8XT%Js+-B)fcCUQxv)*la08FxM' );
define( 'AUTH_SALT',        '*~GPIvjkxhww&tORj}VBC.=P0NJBV$tU.zA=|vqcGny0ynzI}Y;Yd0^?-0f/2Ynr' );
define( 'SECURE_AUTH_SALT', 'I4i%$d4Av~g8TzT(m-8S=nUDvpyp[/= `-D >:hN5s/0zI <-WUfjudK<>e@v_C[' );
define( 'LOGGED_IN_SALT',   'eP&&j{d{G3WYM/IT[XVtEL@MGAPonY<Y.?^u;eD,X3gGQJ5hnyAFacDSh!)4AY$J' );
define( 'NONCE_SALT',       'IpRf5I%7~J.{`?M?lbJIfB1(Il%h[{r_+OL8~]-Iv7RAq4:J`k/`FNL9xQUU:[_(' );

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
