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
define('DB_NAME', 'myword');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^k:DL`Fz){n@OsCiH+lLB**V:s^R7:>I)0z*Q;2~2A?Jci(d~2Iu9_,s~#QW0n{d');
define('SECURE_AUTH_KEY',  'g;^pRTG@;8sE,@:X`J9 0&2^2A|>t{AE5lq*1@n`XL5l>q|U@F7fO|@M7$!zMu:l');
define('LOGGED_IN_KEY',    'W!5AisSCn>&eXx&^:[2MDf}E-}3=|a`p$d}4o% p#Y!X4z?;O/p$8g_=VI<W Gc^');
define('NONCE_KEY',        'H6n$,g|fNn|TjeT(aBM@(;,u&04#;]HG[51WB^wq?_MU5}?`>q^KyADP}dYO;zTV');
define('AUTH_SALT',        '_q7D=yNmCxA[Nu^RdEIr<c]%|<3=%2^|We`R&jRYEdFXf-6X9-:BGPE57reF_h|]');
define('SECURE_AUTH_SALT', '#%$l4ijf,}?(4<,yjTP:tZ zm<,Ao9jk5Yd#|yQ~QDV}kq4IMQ&Jdpy ]JV0/XV6');
define('LOGGED_IN_SALT',   'WuA.hRu4NgF5#t=+hpDP?X}kPH)0{[7IEM:P0@m2@4zF|Z@%doPdB(5W?:@i3]3-');
define('NONCE_SALT',       'qaivrP)`kwBT6L1; VJupolm$7?BaHX)/#7QP(CV^*HF^*xL7)bjSt49_U>_& :v');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
