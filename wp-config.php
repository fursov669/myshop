<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'myshop_db' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+?bk6^OvyA.&&cY{KieV+gQN4_m[O)x$jS1rafClV6auet|N6sgXyoo+~t@P@U=c' );
define( 'SECURE_AUTH_KEY',  'u:ZOZMrk2kYDr#AoP4SJ8e95}[@Er`Ip:+D<B<{/8jG/d-:s.QY@~xbqL+)?6[~K' );
define( 'LOGGED_IN_KEY',    'cReAb#o-7[<L1XrY}<!D.&e3z{FI84f9nTH$Pcp|VZ0c_&a@qj`0GnY4WK~,bjiv' );
define( 'NONCE_KEY',        'a0%M{^4Jg)NN>ihDV xO.${d AO#^0@m8Lcp7_3|vb<RN$5Y#dGN$=&7lK,>wYU;' );
define( 'AUTH_SALT',        'I~5YyMKddx_Q~B^8(eo[};jOci=Mv3^nYL~Kt~%MbLG*rWk#DtFS-p>oQrXhr>{[' );
define( 'SECURE_AUTH_SALT', '^Vo@-8FR*WgAy+pE$PL%z(cIsA81eD3_*YB8e?]kW?4ba~CzKD7YH/W@,Z}YEyoi' );
define( 'LOGGED_IN_SALT',   'RZ9N&qsmU!lS<jcUU[efVQo2 }y6UvUv-GH6 nVTtd7_`Zqz|YhRF8s4eJc-JS`c' );
define( 'NONCE_SALT',       '+`LNe.LO9Jzhuss@Pvf@Da>Y@@u7S,9E/1yj!#y Z:UUr{ICb0J{T@?n>lt%>`s}' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 *
 * В процессе установки указанный префикс добавляется к именам таблиц базы данных.
 * Если изменить это значение после установки WordPress, то сайт снова перейдёт
 * в режим установки.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
