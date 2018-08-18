<?php
/**
 * Grundeinstellungen für WordPress
 *
 * Zu diesen Einstellungen gehören:
 *
 * * MySQL-Zugangsdaten,
 * * Tabellenpräfix,
 * * Sicherheitsschlüssel
 * * und ABSPATH.
 *
 * Mehr Informationen zur wp-config.php gibt es auf der
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Zugangsdaten für die MySQL-Datenbank
 * bekommst du von deinem Webhoster.
 *
 * Diese Datei wird zur Erstellung der wp-config.php verwendet.
 * Du musst aber dafür nicht das Installationsskript verwenden.
 * Stattdessen kannst du auch diese Datei als wp-config.php mit
 * deinen Zugangsdaten für die Datenbank abspeichern.
 *
 * @package WordPress
 */

// ** MySQL-Einstellungen ** //
/**   Diese Zugangsdaten bekommst du von deinem Webhoster. **/

/**
 * Ersetze datenbankname_hier_einfuegen
 * mit dem Namen der Datenbank, die du verwenden möchtest.
 */
define('DB_NAME', 'DB3468690');

/**
 * Ersetze benutzername_hier_einfuegen
 * mit deinem MySQL-Datenbank-Benutzernamen.
 */
define('DB_USER', 'U3468690');

/**
 * Ersetze passwort_hier_einfuegen mit deinem MySQL-Passwort.
 */
define('DB_PASSWORD', '834Ads22!!834Ads22!!');

/**
 * Ersetze localhost mit der MySQL-Serveradresse.
 */
define('DB_HOST', 'rdbms.strato.de');

/**
 * Der Datenbankzeichensatz, der beim Erstellen der
 * Datenbanktabellen verwendet werden soll
 */
define('DB_CHARSET', 'utf8');

/**
 * Der Collate-Type sollte nicht geändert werden.
 */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden untenstehenden Platzhaltertext in eine beliebige,
 * möglichst einmalig genutzte Zeichenkette.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle Schlüssel generieren lassen.
 * Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten
 * Benutzer müssen sich danach erneut anmelden.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':~WJ9CEq[>qGOrOd`=&Xh.y6s%$7<-p]+^]WN@}&..4,c~7uB@+k8#5c_7Z8B}$l');
define('SECURE_AUTH_KEY',  'Ug2L1r#Va|lZ|f;6uggmT8lVtU/-_!T{}z$;TRlL#Jz+n!6Ty)5Rie8J!s+Sd!R$');
define('LOGGED_IN_KEY',    '~M)`_lPA$T5xlj_p$E-?}Y DBz;wb1o9]Q}?!E`;@?;:r&1d<7xS(LYDdIwFgTFs');
define('NONCE_KEY',        'hU:)`Rpfs-,zSk34iH>.E%;~ZxhuOX1 Y#I:3$NYwHBuFM3EZ0`V3MxNIn5!+H$:');
define('AUTH_SALT',        'S>}#Rsu7M:P%@7~}:`O1qFZya4_kSBV#OQ-fL7wQr-zeL/Ajnkv9fOj1-F&Pe^R@');
define('SECURE_AUTH_SALT', 'z^U/q@;3uyc*d^Wz:i^K+ORb<LgIP-64A^-Uba>lO&U1U9KWE5v;Z<NR1.6g9Q4/');
define('LOGGED_IN_SALT',   '~j+$Cn%}(v4:3(gnGJip1O*0 p:F9~_~cq.#RArS0Bp+*)mT.OnRMRhMAR>ZMhJ4');
define('NONCE_SALT',       'h[o5H6a)wl>4+7Rf/|-zh_+-wM8=LPR6N&-M_d-&NH-8uXBY4y+ 1tqJ- A0trNM');
/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 * Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 * verschiedene WordPress-Installationen betreiben.
 * Bitte verwende nur Zahlen, Buchstaben und Unterstriche!
 */
$table_prefix  = 'wp_';

/**
 * Für Entwickler: Der WordPress-Debug-Modus.
 *
 * Setze den Wert auf „true“, um bei der Entwicklung Warnungen und Fehler-Meldungen angezeigt zu bekommen.
 * Plugin- und Theme-Entwicklern wird nachdrücklich empfohlen, WP_DEBUG
 * in ihrer Entwicklungsumgebung zu verwenden.
 *
 * Besuche den Codex, um mehr Informationen über andere Konstanten zu finden,
 * die zum Debuggen genutzt werden können.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Das war’s, Schluss mit dem Bearbeiten! Viel Spaß beim Bloggen. */
/* That's all, stop editing! Happy blogging. */

/** Der absolute Pfad zum WordPress-Verzeichnis. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Definiert WordPress-Variablen und fügt Dateien ein.  */
require_once(ABSPATH . 'wp-settings.php');
