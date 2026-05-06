<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u858226826_lM384' );

/** Database username */
define( 'DB_USER', 'u858226826_KE4xh' );

/** Database password */
define( 'DB_PASSWORD', 'zPBYfbcik4' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '=^I$-Vip7yh/{UNEUXKEdeg@I*Dwf;%_9hg4^2QLG@l9=C|5DYTq=0I-WQMJudi+' );
define( 'SECURE_AUTH_KEY',   'npK0.IpvnKP$?,.=sYay]i8kBre5JKk/q9kln<=ftjodz-*w.tl&bejE-za#U%z9' );
define( 'LOGGED_IN_KEY',     'uixsJ|H`{}37@s>Rg7:<&hNt]LnoMl1w|j~|K*#<nO+ouB|%hFF(Lz8U-s#cgZ9W' );
define( 'NONCE_KEY',         'oL.)=9/Cj}HMW%sZBn2HZ! S4^r(Qt-lBAjFs[DJMy@#OZ~ir|ZZ_8L&Huj-D/gi' );
define( 'AUTH_SALT',         'iY-!ND6tAQPG!wQAvZ=h_c:d8DTJY1YP)52v9f#dlltvRld@w,)UMURgg+6/?II&' );
define( 'SECURE_AUTH_SALT',  'H?0{Ew_a<>P[qp?8?%ILoe-9KI>Ng>A$$Y(k%xzd}y;x`,E]qd!tVL]2KqyS[8Ui' );
define( 'LOGGED_IN_SALT',    '_UVeOHapc_Ft5NRuN]29dnCi_ii/]8+@rTsKJRO*VDe5 P9jIz:[)K9;UOMNLyP=' );
define( 'NONCE_SALT',        ':Xd*eK`u}C+ &2:*FX~ya#2;,T<4I}8s5-JE(0`R6)FmEcu6:Gb?WOdY%JJ^whjy' );
define( 'WP_CACHE_KEY_SALT', '(P:86u<MMO7W6GX|7AV]_N}1L^*8H3@(}eg4_UY3EFbcHOuQL37D%)5R]Gss3u{I' );


/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
