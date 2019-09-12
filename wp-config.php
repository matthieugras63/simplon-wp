<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'matthieu' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '#Psychoses43' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

define('FS_METHOD','direct');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Dco5kRxN/Ecmz0{R=FXM{7|24{%FO:aX26V*0=!$8$}HbyK<#Zo&heEDFWGVo.O@' );
define( 'SECURE_AUTH_KEY',  'm]4T_+`4a,3(gu|QQmydySU[A$a_j-YEaaw^JEqhkH1pi! tZ=`s|*$1eki0{Kc!' );
define( 'LOGGED_IN_KEY',    '6S=?&gqkREtgknA`v2R];m db63P$+jF:-+h:1wK`[EYFm1`S`w<v<(EA/!SoY~!' );
define( 'NONCE_KEY',        'A5B@24b5;Pf!E~D>3n79ZXpG[R,{y^n!Vl-438az)6:OZjq6QUvHL>Qm0#)<wFY;' );
define( 'AUTH_SALT',        'iMemw*TkYw2Nl& 2Ai+@5:1bdSnC7}m5bL0OR{@6+[o|am2N0jnMow6q&[?SjZVn' );
define( 'SECURE_AUTH_SALT', 'cEC%9nJ_SdYO]ws#XreNb1duEq_!5PtI*mkI]<&kABd5Nr;;WzrC/vb%><DP&J4.' );
define( 'LOGGED_IN_SALT',   '{gcLYltY#3AUp6b|xl6]G)siQCCr{{0G$*mlVa*L(?x6`m:?l/?OH9s^OJQ@p,{~' );
define( 'NONCE_SALT',       '!c*ipNC&|SBFeGN$/iOEI=IKT AHG_pWu^Jw[_-DY>%n[^s]+a203sEq(,Wb`B _' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
