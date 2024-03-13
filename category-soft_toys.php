<!-- включается автоматически, когда страница /soft_toys/ -->


<?php
get_header();
?>

    <div class="container toys">
            <h2 class="subtitle">Мягкие игрушки</h2>
            <div class="toys__wrapper">
                <!-- выводим цикл из карточек товара на главной странице -->
                <?php
                    // параметры по умолчанию
                    $my_posts = get_posts( array(
                        'numberposts' => -1 ,
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

            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="toys__alert">
                        <?php the_field('contact_us_text'); ?>
                    </div>
                </div>
            </div>
        </div>

<?php
get_footer();
?>