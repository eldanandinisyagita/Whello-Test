<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'whello_test' );

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
define( 'AUTH_KEY',         '.+W0=*3@4WEDXv5Vh+xOLd0{-`:@@+O7VG}M*S_;oizfp.]D{DDiX04^ 8K/W/5-' );
define( 'SECURE_AUTH_KEY',  'ywGKk0g=i:DWwE_`ANj6fw2SgZ$m0<U]v!,Ff7(uWUa&D*POCn?oU^MD2aC=`MwD' );
define( 'LOGGED_IN_KEY',    'h-.}3N]96gw(`PZ.|>Wd_NcKlkvKhRH}*]8KIvti1]aHMz9[VYMseG-(LUY@nNF5' );
define( 'NONCE_KEY',        'E/eW11ZqQ@#K=3-f|u0KJQeniCWg##afo9y0_yfMhH#6-ZQk=k:5$ppIHg3l~HMM' );
define( 'AUTH_SALT',        'DD:o3 zr}+l&><~pI2<k@}AQUd)QF_Mne]umPH?me<~J}<?Mc/>IyEd8.y:%9,ce' );
define( 'SECURE_AUTH_SALT', 'w$I%kkp1s|]Feuj|G;J[;#*qzp`t$e2MFZeeroA*E.+(.MBc+ftO&HU3b*1e{e9A' );
define( 'LOGGED_IN_SALT',   '~YqRvAR%Y2>|69|Ft^h>%WUU-#-nRe#C%7hOhtot~_cCMk/jOjqF(CZE<3Py$^ j' );
define( 'NONCE_SALT',       'QW1#51;^[FWQRoZ 76C!mfqWMBN]%wXX6]c5%pe2>7lm(JeQyR8?w^d6Y7rLMNd&' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
