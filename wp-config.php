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

define('FS_METHOD', 'direct');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'freighworld_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'lucidoccum');

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
define('AUTH_KEY',         '{rIBj5KzzU+qw``U6A=A~9 ieqB=$R;cma0YQ&,3 I4OkzVgX[RuK6}J}03xEgl{');
define('SECURE_AUTH_KEY',  '&MvrbpZGN-~aHV?u=M}!uoc6%i]qg3?C;}z.S:Xjp3px:O!ZU?&asgLgW0a>R0iB');
define('LOGGED_IN_KEY',    'EWkf!.h@L.*0JRnS5z(&imB{D$<x]7)}J4b 2T*9i&os;VOr:Y/?&LKyYF$qJo9k');
define('NONCE_KEY',        'tx1WY7;<1A~,G:k`Xfc$ qgY>fL!zvi7GSL36~57kX(o]C;EH6saU=<5IfVj?aZ=');
define('AUTH_SALT',        ']Y5qh0R:@P|rtie*c*Ts~yd^G!;aigMqRYQoZP.l7kfy)@A)<4RT^7+gEi2mTa&0');
define('SECURE_AUTH_SALT', 'qOFemOWX ^sYHlLD>t`_Ss.]ixS(x7YL5]&P]gMDAS]+Rp#f8nl,Hwn@hsFG~f3N');
define('LOGGED_IN_SALT',   'C;GM/y8@Nj:+9zq,]5eRYfH~w:*BnfG,UnKxnuF@!j(@0>yd:IpU{tB{@y:lxGPa');
define('NONCE_SALT',       '_EP}?#1 P{1~%O(j8$Exrlp;@)vL/|?TE`=t2=A7pUb#0HTa9BMrxRtVcGjb&TD?');

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
