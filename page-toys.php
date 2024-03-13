<?php
/*
Template Name: Игрушки
*/
?>

<?php get_header(); ?>

    <div class="toys">
        <div class="container">
            <!-- Мягкие игрушки -->
            <!-- вывел название рубрики и ссылку на категорию(рубрику) -->
            <a href='<?= get_category_link( '3' ) ?>' style="text-decoration: none;"><h2 class="subtitle"><?= get_the_category_by_ID('3'); ?></h2></a> 
            <div class="toys__wrapper">
                <!-- выводим цикл из карточек товара на главной странице -->
                <?php
                    // параметры по умолчанию
                    $my_posts = get_posts( array(
                        'numberposts' => -1,
                        'category_name'    => 'soft_toys',
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    global $post;
                    foreach( $my_posts as $post ){
                        setup_postdata( $post );
                ?>
                    <!-- the_post_thumbnail_url - берем ссылку на картинку из поста, добавленную в админке -->
                    <div class="toys__item" style="background-image: url(<?php 
                    // проверяем есть ли картинка в посте, если нет, то ставим заглушку
                    if(has_post_thumbnail()) {
                        the_post_thumbnail_url(); 
                    }
                    else {
                        echo get_template_directory_uri() . '/assets/img/not-found.jpg';
                    }
                    

                    ?>)">
                        <div class="toys__item-info">
                            <div class="toys__item-title"><?php the_title(); ?></div>
                            <div class="toys__item-descr">
                                <?php the_field('toys_descr'); ?>                           
                            </div>
                            <a href='<?= get_permalink(); ?>' class="minibutton toys__trigger">Подробнее</a>
                        </div>
                    </div>
                    <?php
                        }
                        wp_reset_postdata();
                    ?>
            </div>

            <!-- Развивающие игрушки -->
            <a href='<?= get_category_link( '4' ) ?>' style="text-decoration: none;"><h2 class="subtitle"><?= get_the_category_by_ID('4'); ?></h2></a>
            <div class="toys__wrapper">
            <?php
                $my_posts = get_posts( array(
                    'numberposts' => -1,
                    'category_name'    => 'edu_toys',
                    'orderby'     => 'date',
                    'order'       => 'ASC',
                    'post_type'   => 'post',
                    'suppress_filters' => true,
                ) );

                global $post;

                foreach( $my_posts as $post ){
                    setup_postdata( $post );
            ?>
                    <div class="toys__item" style="background-image: url(<?php 
                    if(has_post_thumbnail()) {
                        the_post_thumbnail_url(); 
                    }
                    else {
                        echo get_template_directory_uri() . '/assets/img/not-found.jpg';
                    }
                    

                    ?>)">
                        <div class="toys__item-info">
                            <div class="toys__item-title"><?php the_title(); ?></div>
                            <div class="toys__item-descr">
                                <?php the_field('toys_descr'); ?>                           
                            </div>
                            <a href='<?= get_permalink(); ?>' class="minibutton toys__trigger">Подробнее</a>
                        </div>
                    </div>
                    <?php
                        }

                        wp_reset_postdata();
                    ?>

            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="toys__alert">
                        <?php the_field('contact_us_text'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>