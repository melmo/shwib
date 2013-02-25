<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'shwib');

/** MySQL database username */
define('DB_USER', 'shwib');

/** MySQL database password */
define('DB_PASSWORD', 'DL3vGBTaadbCwJ8c');

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
define('AUTH_KEY',         'a~S5-:p/a|xu+~Gmy~`tV>3E3-OsmZ-zz*JcdNSbw{b:X$PB|o B/>S ~UjUONf:');
define('SECURE_AUTH_KEY',  '-BviIda[JY-Sy1D*+k@C|v8otzE&ABBXSzO#Z*I)H2f@511KWSDb3W%>174cS;<}');
define('LOGGED_IN_KEY',    'ZGX#W}%p:&+cnE9 !K`oeap |.>s+OdUAXi1jm)K,_Y{>)s)$~)a-cF#rc{ulBj<');
define('NONCE_KEY',        '}Jp*DVEzsI|xyKTv^|8IOz87Dd5|w^z*ni+!x9>9/pU|B:-yDoR_+UW@9u[@ w`%');
define('AUTH_SALT',        'e=EBX;>Wv 5h%LlxC@V-PoMpl]NbHf.kIL<Hb-EJ#PR_9Ha,p_kB(sf-r>|3m^l(');
define('SECURE_AUTH_SALT', '6U4C-FBmclm8~u9J0A[lg<}jz7]EB~RjX^yb#yv9wm7gK;Ijv?<X#V,#A2 CSB6S');
define('LOGGED_IN_SALT',   '*JJ;nMS|VoJJP`G`^Fr!A>CBU5YT<4yJR1Q$8nGk 8_K`!j+B<XTM{%Q^hi+U,G(');
define('NONCE_SALT',       'mo=j/-~VE4]Ur[^Q7B*7|#rc*XFk-i6C+`=/5!5|CenrM;bG%bI0cq0av]QSM.-T');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_87698768877_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
