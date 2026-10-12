<?php
// Подключаем стили родительской и дочерней темы
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('astra-parent', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('astra-child', get_stylesheet_uri(), array('astra-parent'), '1.0');
});

// Регистрируем меню (Пункт 5)
add_action('after_setup_theme', function() {
    register_nav_menus(array(
        'primary' => 'Главное меню',
        'footer'  => 'Меню в подвале'
    ));
});

// Шорткод для вывода главной страницы (Пункт 6)
add_shortcode('home_page', function() {
    ob_start(); ?>
    <div class="hero-section">
        <h1>Добро пожаловать в наш магазин!</h1>
        <p>Лучшие товары по низким ценам. Быстрая доставка по всей России.</p>
        <a href="/shop" class="btn-shop">Перейти в каталог</a>
    </div>
    <div style="padding: 50px 20px; text-align: center;">
        <h2>Почему выбирают нас?</h2>
        <p>Качество, скорость, надежность — три кита нашего сервиса.</p>
    </div>
    <?php return ob_get_clean();
});

// Шорткод для формы обратной связи (Пункт 7)
add_shortcode('my_contact_form', function() {
    ob_start(); ?>
    <form action="" method="post" style="max-width: 600px; margin: 0 auto;">
        <p><input type="text" name="name" placeholder="Ваше имя" required style="width:100%; padding:10px; margin-bottom:10px;"></p>
        <p><input type="email" name="email" placeholder="Ваш Email" required style="width:100%; padding:10px; margin-bottom:10px;"></p>
        <p><textarea name="message" placeholder="Ваше сообщение" rows="5" required style="width:100%; padding:10px; margin-bottom:10px;"></textarea></p>
        <p><button type="submit" name="send_msg" style="background:#667eea; color:#fff; padding:12px 30px; border:none; border-radius:5px; cursor:pointer;">Отправить</button></p>
    </form>
    <?php
    // Обработка отправки
    if (isset($_POST['send_msg'])) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);
        wp_mail(get_option('admin_email'), "Сообщение от $name", $message, "From: $email");
        echo '<p style="color:green; text-align:center;">Спасибо! Ваше сообщение отправлено.</p>';
    }
    return ob_get_clean();
});

// Шорткод для новостей с пагинацией (Пункт 8)
add_shortcode('news_list', function() {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'paged' => $paged));
    ob_start();
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <article style="border-bottom:1px solid #eee; padding:20px 0;">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
            </article>
        <?php endwhile; ?>
        <div class="pagination">
            <?php echo paginate_links(array('total' => $query->max_num_pages)); ?>
        </div>
    <?php else : echo '<p>Новостей пока нет.</p>'; endif;
    wp_reset_postdata();
    return ob_get_clean();
});
?>