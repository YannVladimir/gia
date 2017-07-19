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
define('DB_NAME', 'gia_real_estate');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'i(tn-B18$hY0s~$C0p+UN4(uys6jK1?rj&f?>chp^zt~tQHz&hhTkYQgQ$^iI 4W');
define('SECURE_AUTH_KEY',  'DAd(o!42uA!kV~-./GhM4!y-Fy%{;IAP@.ucPq>m2SL$,2O`%j{AtB@{7,ZOMV;A');
define('LOGGED_IN_KEY',    'JAJ:jtI!G`wG_BtC;c-F<(5h.=U{l8=Qrpa(SNJOr$aaq_5H!xYP:4c37>[;3` c');
define('NONCE_KEY',        'W`cxA<I]-oj,xDrt)y1[9m{A,}u4^8yF?3$}7$Cu=,@s=E@3!NHK/1L* `hrP:Xz');
define('AUTH_SALT',        'T (s_c/Y{ <|:2_fEp$n+jrmF%#J~wongG:CEbpP2qx)uEsj6J/c|C{WqzY``GHq');
define('SECURE_AUTH_SALT', '.%.#_nq)Vh:ZL^U!{;M3H>+:B!;4SZ2yoVEsTYJ50 [tO.XC;Q+)NX3p<i4y4w=}');
define('LOGGED_IN_SALT',   'RCT>$u.XPMvfN-*FETm=F@P&=s(Fdm]Z,/@M.1:<12<.vH oh*^h*84[# E/2?e2');
define('NONCE_SALT',       '3Q/H~9VF=)Es )@hSO.1gakp  Q^em2_[+i$a6TsX*BZR]iweNl8V(UTnr0px`FS');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gia_';

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
