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

// * MySQL settings - You can get this info from your web host * //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_hellolive' );

/** MySQL database username */
define( 'DB_USER', 'hellolive' );

/** MySQL database password */
define( 'DB_PASSWORD', 'IVZjsywkvqmudvGZ' );

/** MySQL hostname */
define( 'DB_HOST', 'myvios.cloud' );

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
define( 'AUTH_KEY',         'Btfxj{=/|*ni)s2fWr|JjFr%IAYzepp16=Yto!L`htJR^46`~.$Wu9d(J3>/|>B|' );
define( 'SECURE_AUTH_KEY',  '9zbHrAj)k:.M95N<!l}O+$7U~:^ $@e$84KJ=]KqzC`ta1yw_.g(0Nf]RR$F.D<c' );
define( 'LOGGED_IN_KEY',    'P}1H<bd>FzTNJTMi%u,iAnN~JlG_Ma o4^)=GE&(1YaY/sLSsJMN4#o7c`LyHR(r' );
define( 'NONCE_KEY',        '.WIaT0Gdomwkqa#R3m4l48@!%K<0vH+[u2{fd.[tEF|q/`c]^@pAB6=xZy8n7xb@' );
define( 'AUTH_SALT',        '5UAQ*ws8-q?E&=+(r5<,4KxeCbLUk+.fno7J)*]C{)L/>&l7KYKgkeQjSn(U<tHI' );
define( 'SECURE_AUTH_SALT', 'OulIAdlO}{y;,w*41#e$?LX f.NdcLHj[n[uibS<Wl4IE/:sw!:Ggi;@w`liN9ud' );
define( 'LOGGED_IN_SALT',   '!)Yc.@`S9Q,2oM`@xrKwTG`a4bmi7/Lmq2~4`JK42UzR1,}ue=w^r5AZ<2ePA/3l' );
define( 'NONCE_SALT',       'HWsSm#NzcH!YU5YW7!ObEaee.A9x_YR6A/7/G-Lyy_&B1y#8y(2Wi7CuVF 9cxe9' );

/*#@-/

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', _DIR_ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';