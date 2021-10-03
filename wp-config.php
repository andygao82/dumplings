<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'confucius' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         '[xvKx!ybWdnGNCN?-VNa! a9TocULTG3t:<vzb4fw@WyTE8>*OFf|iLcL~OhD y2');
define('SECURE_AUTH_KEY',  'j+>aZ<2: ^g88+0kmah6B2UzH]V?%R4fZmyM*k+0} YVnT7[R3F:`&+|%^68v4;O');
define('LOGGED_IN_KEY',    'wCVjW_I?!G<9(,e.]I`*Mdufo-B~#wYuH<v9c{H.~+3{;!6|.F<s^FwWq]wFK Y^');
define('NONCE_KEY',        'yT[,yebAUA5pl2!$ES;OUQi33i({zn*T~R=O,U]H(qRN-tvNNrM>a=&q-xG%sW%}');
define('AUTH_SALT',        ';PnzmMO)k)-$1}k*`rb-<Jzc6]{9`oU/Y/DRx=gY1i`(B95VOg|vb|)+#A`R&`+u');
define('SECURE_AUTH_SALT', '_8zA!U /%ci{=jkB{gScQ#^~A6[XM!m$+/P`.u_KH^px*]R$Uxp3(QQ<Oax<&0Gw');
define('LOGGED_IN_SALT',   '8-JO=6[q|-e4j-AHU]YZ!kYYmjnBsq [Q=g|0=+9c!?f5(!H&r^^h1C,1C|(_!}c');
define('NONCE_SALT',       'sekJqYc[bTW+L^:E<GC+IIz+}o|&!lU&Y{7R|X_<jkR:DGgu7^)`<$_K4+L{lUu]');

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
