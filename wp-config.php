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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'S' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ',O=`[W{}QdDi^oJ@Bcb*ZJy4s61DYP%;IDCE2j)8%E_EQL7n}-:}9r q;hL6c8jj' );
define( 'SECURE_AUTH_KEY',  'TMOfsm5;(HH6$+ry#u#MgsI9mWim%x<`;f_rfBZxR^+Z=-k}y!ZRaXL?C2)JoS4x' );
define( 'LOGGED_IN_KEY',    '_+u{Er[aenCjE%4$|rc`X8o+l!nhPw.a5>&l}KO1Wz{-V6yC#Xd08F1-#i?5>:t0' );
define( 'NONCE_KEY',        'l?_C^I1*{~{A5StT;)uk-or+u5k`O6ATj6l*O5Ev QV=qs0%#HWz2&g2^pCNOB2=' );
define( 'AUTH_SALT',        '[[<p+,O9aN6!dvEoSJZTA2T==j;GUA~evaM$l/v!M+.VCf-xS=&DBuElBRK)O0j{' );
define( 'SECURE_AUTH_SALT', '@mMC[B;].gAn?T9j,``H+4$YNWaREmd3gfIK69sh<(>%F#Q]>/)6lr}L1_,L OzO' );
define( 'LOGGED_IN_SALT',   '(3>FH43P hfHgLw>HPj%m6QWQZ &T`#>(+MOn&`gt[LyjD~{^6=KHx8/,-UNTZG>' );
define( 'NONCE_SALT',       '84`QH;8=|23H5z-rTktuy[);M]^2:dG6In.:-TeC$I#zz}1<StT F<Y;82aQy=^^' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
