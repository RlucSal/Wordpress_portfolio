<?php
define( 'WP_CACHE', true );
// Added by WP Cloudflare Super Page Cache

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings
//Begin Really Simple SSL key
define('RSSSL_KEY', 't6osXnIdTEPzYcwNsoIPmWYatdY5uihwEtr1fcHKuJk45LUpHbOmLDR9GbhO79Ei');
//END Really Simple SSL key
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
define( 'DB_NAME', 'u711599179_8SqCG' );

/** Database username */
define( 'DB_USER', 'u711599179_YWXW4' );

/** Database password */
define( 'DB_PASSWORD', 'efcd0gPHAA' );

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
define( 'AUTH_KEY',          'z>d&4z.*UlzCB-U42^Dq(hKfm8ixj!|q<{?<18FWYL99?x3^6q,cG]l@<}(`X;ac' );
define( 'SECURE_AUTH_KEY',   'CB7II2nyaAE4jyfhFhz2AF8nr!rF8-~r _w*^r#HR@]PK^$T|IPs6qd<T<2wN~nd' );
define( 'LOGGED_IN_KEY',     'xCrS`x*Ko-m}M6nQi29_UV,SlDvH5Y:4 x|]k;Z@G/r}&GZUT>c1@TL|Jx#oRMe#' );
define( 'NONCE_KEY',         'yEzdL^CWoV7OhSG]<K2nH&H[P?#A1ppEvZv=E@1-~[xg@A)*7R*!B2wm=y#TlcHF' );
define( 'AUTH_SALT',         'Wh*dJF!)w5?UqZ[b2K8d[iinYz0t1F&<xS7/xD5@a:nK55<=8 nGyT0HOin?*|bs' );
define( 'SECURE_AUTH_SALT',  ';KxGCGOx4K9m^pbhBP,(ctP+Cod^ ]W4c@0b7etr7?*NMeR1*(m%g[4D+]0(a6u*' );
define( 'LOGGED_IN_SALT',    '{C,TU_[C3_*/NVHBTM{-5ifFDxAJIlG<PvQ/I37Y.4%k#v6!LN(EOs<bo~`AXXv$' );
define( 'NONCE_SALT',        ';%wHOi.W{b Zpci1:N|d? &NVQq! +M;9Gx,:ouL&;kWiu:lHkhG77>~xqaz&E`^' );
define( 'WP_CACHE_KEY_SALT', '3+:`g!0Rml&$Sj!/l!6R}?=1nL,mar#{[(3P)*!tA1;D~(pIA%+`Yj3M=$4|Uzfq' );

/**#@-*/

/**
* WordPress database table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix = 'wp_';

/* Add any custom values between this line and the "stop editing" line. */

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
if ( ! defined( 'WP_DEBUG' ) ) {
define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
