<?php
define('WP_MEMORY_LIMIT', '128M');
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
define('WP_ALLOW_REPAIR', true);
// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'apkee');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'r00t1nf');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'c$&cfq)PDM=Cqb:UySLsm:5-OcuPQt=6:*Xuq7TxFY{S|;)iASXAKtG1`z9a*|.]');
define('SECURE_AUTH_KEY',  'Zr3@.?|X[lI-6H~E7m45^Y&/A5^[du`0nMx(O85CcsT9?b }t-peYt|@:-v[L><u');
define('LOGGED_IN_KEY',    '_k#GmRL1*]thYt Rsm@OXIMjDfh+*}X;i-0nF-zJ_uaP&fl.|{D{o?${?;!|.jS1');
define('NONCE_KEY',        'BC*rI$~9crq0[aZ,My->^9.V#fHvdtT<t.]<?%k.r 3DO~uWUjik4{(@ZmDG+AI|');
define('AUTH_SALT',        't(,o-6OH?ME(fd!4m|rA|TuGbT@mQm%1&MBbFE!h+v98~5bb&LC$pzt62m--!)*5');
define('SECURE_AUTH_SALT', 'tLO}#aqo25*D1T(CE;jH_H/t%yK;][_2O;xB*IZlyjB~[v#8[|:z2KRpKYW|=G9r');
define('LOGGED_IN_SALT',   'KeF^AiG4)d3j}<MUU&CAwuxO+wq3!/n8or-|--PAuLA5|l)Vr}15!wv%=J8~Lh5J');
define('NONCE_SALT',       '#-Hc8+x9P:,GfY:5>K?[XwOxGslz y!2gW~fcCsC,Sk[;AoWIW >SwUBZLQ.>]<Q');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');