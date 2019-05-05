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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY', 'mm.+C.>/)(4-ubz9 Q,F.QUEJKsQ^o`wq}6y&sU,6{ly|IbQ}#9femu.[YkenH=X');
define('SECURE_AUTH_KEY', 'i^O3~M mL4Df8Z;(t%n$m:&XXqipwo<fHLAb-B*ni)xUuy7klI{3y_`lL*Ur[w`O');
define('LOGGED_IN_KEY', 'D1{TkH]qC(i<:4mDHF*%J2;+Lzbe*L8|H/x2-<Uzuv)4yl#Q`bt}]-fs0dpvZfe1');
define('NONCE_KEY', 'k:pEaX ]Z_W?{l&0l4Ms*(u}WHy-kOgQ_>9_j7]q-B9{{AZD-Z_j#548Ng%dYjlI');
define('AUTH_SALT', '*x4m%3DfRlsXNR6/tO7-{D)!j79ZTLhZ<gB>/w6hJ>:L0@-JKvFm@FRu~@Iqz.k&');
define('SECURE_AUTH_SALT', '_Iz/E_e6gV-MH(Vd<J]=@/}}/%5xP=<<0:0*q%j$dYx6o<6Kx_8@h=g|:1Hm@RJi');
define('LOGGED_IN_SALT', 'nCHyO<9s@&)a^pYK Y$i)v~o^^&6|gc>9pCBm<B;z$xFItT?ud@9uGx4%5V[5@ ]');
define('NONCE_SALT', 'VAhnDX]Mj,Np*0huKO,,HLeajET;[FP,LbPTtb8<rl4IKl6yOU1u#_89X3>;v>qs');
define('WP_ALLOW_REPAIR', true);

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
