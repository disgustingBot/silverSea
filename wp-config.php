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
// /** The name of the database for WordPress */
// define( 'DB_NAME', 'silverse_web' );
//
// /** MySQL database username */
// define( 'DB_USER', 'silverse_admin' );
//
// /** MySQL database password */
// define( 'DB_PASSWORD', 'M-9!-^%jZ*h5' );
//
// /** MySQL hostname */
// define( 'DB_HOST', 'localhost' );


/** The name of the database for WordPress Wave Host FINAL!!! */
define( 'DB_NAME', 'silversea_web' );

/** MySQL database username */
define( 'DB_USER', 'silversea_web' );

/** MySQL database password */
define( 'DB_PASSWORD', 'qXne2abld1' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );



/** The name of the database for WordPressLocalHost */
// define( 'DB_NAME', 'lattedev_silver' );

// /** MySQL database username */
// define( 'DB_USER', 'lattedev_silver' );

// /** MySQL database password */
// define( 'DB_PASSWORD', 'fyumESiif5jHTwQY' );

// /** MySQL hostname */
// define( 'DB_HOST', 'localhost' );




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
define( 'AUTH_KEY',         'i?U+q8.4fS)sf}+edt2;Yuk&[.TlSGUEtC#ax(nLxvaVY6I.s*-EX6)?zQ2aqa;t' );
define( 'SECURE_AUTH_KEY',  '|7z>q,4f~n{9QTySY3XmEql4gS 9Ce@&|oE}%Gt}Dh7/d3l)d0Urg>H~$E3v.i`g' );
define( 'LOGGED_IN_KEY',    'TgAkwpRgi!7YIN%^/ cv)62W;bt`EZMxap2UEgP>|E6B`^HMd/uv0AJioEMv{}Lt' );
define( 'NONCE_KEY',        'Zua,ym70%Wvov,U)_.<? Y!wi{t>x+jYA]FK$XfJ`Lb>ElN}okgO8Gxv>~4pA?m*' );
define( 'AUTH_SALT',        '_h20tebR>7lBNRf^Z:,*^K&<.[]e`a{Vt WmSXH{Tn|$u3L:_+>nzc^|Ca:.;~Dj' );
define( 'SECURE_AUTH_SALT', '62F$3*+|i6lyd37mNJL OG}:|qI^h_4Q7W+?HP-yJwy4=n/KSJ12L %O7z]l<A%*' );
define( 'LOGGED_IN_SALT',   'LDF~/pBedOl!`y6L!(M%L(uW5`GV8bY(^smcPF&c^N|J%Q^k<1CN[>PDX.k%BjQb' );
define( 'NONCE_SALT',       'V,yMWEJ)KJRyN;lK^jHZ2eO|tiF&U1|E:|Uu#~aGtBW!pobUGO<a/-96rE5?S/sI' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
// define( 'WP_DEBUG', false );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
