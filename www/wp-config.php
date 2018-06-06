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
define('DB_NAME', 'proprietes');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'sorofing');
define('FS_METHOD', 'direct');
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
define('AUTH_KEY',         '|Q1Vmr|eeA%IaGcC-9oP1wwC2gNI!/sAYVk_R]G%^6FwVQs%81X|A1d05B]GyA!x');
define('SECURE_AUTH_KEY',  '*6%$$&xQWpk!T2bEA7h7!F4`:0Bv]&NWbI)N$#>//hcDZ1!M6Wqac4+QU@}ZA,%J');
define('LOGGED_IN_KEY',    '<hpD04S[HP5Oj+0nHpQ7/o?UFHvSO3A/`P(T`AT&h|wAw}yL/gYtkk6}Z1;Mh&1!');
define('NONCE_KEY',        '}&&s-`m6Ky_SU}!d=JG[([Fj?xIL)HN%`1{lBHv7Vu4Dpe[62Db7UVV_]FrJ?Sp?');
define('AUTH_SALT',        '&n`clw07mK}:C+rSV bxrJzz%i.%.1zyu0A{S^Q;_Fl[n[,,B@gno1{WvIcwufra');
define('SECURE_AUTH_SALT', '%.W&(#;g/f1{$,zQNT$aVXL:, fIEK62`:LYwx9V#OU`6KeJ3?uozw;ys~fEi}i[');
define('LOGGED_IN_SALT',   'rk3ZTcuv5^i@b34[P9F&kY&nc%GSc1vRzp]2yVeX -pq>nZBOB:~gr*&;m`|DM[3');
define('NONCE_SALT',       'dY^!`M|~Tss]d%s8)Q.P/ w.TlXHujP[Zf.B,tP#Fu[cr+.tKQ+kq&w~rot_X:kQ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'prop_';

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
