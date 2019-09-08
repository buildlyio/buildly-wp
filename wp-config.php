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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'df027a40d99c82c8e18f5735342e10d2f24009cb6e746b4d' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'swhUF>WewV Vc:mO:q%X&&ZkJk.qMrae$Sy>;n^ R3jP!UfAMA4MjoP~e<t lti,' );
define( 'SECURE_AUTH_KEY',  'bvC6OdZ&[>aLQ0U= 6ci-(38mtGX DZ#n!SOzKKkXb;J?~r(!C);$Y`7<un#)DOG' );
define( 'LOGGED_IN_KEY',    'yPIvcfgnN`+~=.tt(gFGfu{Ppu#Kf$VE^Hv}MGCw;}~z{,~(l+^(>V363PWB+R,p' );
define( 'NONCE_KEY',        'dnTptAwM]})%#`-V#D& UV[ugLeQbrlwDE~RH:2%_gLNfhut9E2p,OH0@8j07,l$' );
define( 'AUTH_SALT',        'CjNQ&84f3COH){BFn.l|WSXbh-tAj{V9pgR[!;vcfL9YZ,Rq.E-4cu4Q$yM=F/CN' );
define( 'SECURE_AUTH_SALT', 'W`d*mIwVpQx$klgei3j<?Mh}&LP!0,.rHK0N)H@#3SYcQVk={tvebfv~8S9K_:R$' );
define( 'LOGGED_IN_SALT',   'aL7{cFqA[ Lx~|,N@(_z_uS%V?o9!^a6fP^q8&XBNCNe+|i${>*AhtGWeH[fauN4' );
define( 'NONCE_SALT',       'wgpn?o*9>ZVJo>cLQ6>!Gr$tv&VkaQ z/z1%xz%t|PAg6]=]yoxC)x~sXOB.#kX7' );

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
