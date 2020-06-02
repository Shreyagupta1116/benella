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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'impil2ru_benella' );

/** MySQL database username */
define( 'DB_USER', 'impil2ru_benella' );

/** MySQL database password */
define( 'DB_PASSWORD', 'impil2ru_benella' );

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
define( 'AUTH_KEY',         '|B6E4!}tfN[a_e2LVI0*yr#dzo-W3+94]]nkN4axz]qIX?tJX4wG|:0D8D%]fb`z' );
define( 'SECURE_AUTH_KEY',  '0y(&upn1THHr-P*vmU`:>JA-S5L@Q{S`yN[9fVz2 |t3$Gd:byr`:g|s[;^ZDsHl' );
define( 'LOGGED_IN_KEY',    'hm[6Rk1zSrlNtP&cPtcOd0I=5rr^{yz[A9mobdI@:LW,w*5MUF[P}RWd87ool|;r' );
define( 'NONCE_KEY',        'PX>rw/DC0mZY]P=I$ZIIcU82%ovu@0j|O?cf-S/Q^bz*KG;!vQ$OtiV@Q32@/ [l' );
define( 'AUTH_SALT',        'V3/gBA^N7` ~<_X h6[=A+JLV/Br^TViTt9^iRSxf_R&L55<w%-MprZ25MqMqWW$' );
define( 'SECURE_AUTH_SALT', 'V;A;DsrNv?Enm?_Zdx^[e^V2VsWF5N#whQe#`cEb9nqX0BL7`WG`BEg3w1.>eM:g' );
define( 'LOGGED_IN_SALT',   '5V`Td}lSyl7bk#EZ-S;&&UK`,.*V!ZGIbh:bey92)[;vgf81-.Jx}/5`^H&olF! ' );
define( 'NONCE_SALT',       '9w&TI( &U!W!G%Oj:8?vD]sRF}9wgCw+X;[?=2=POXt37ae/]Di>,a74i1wK~a4[' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'benella_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
