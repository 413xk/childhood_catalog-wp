<?php
    add_action( 'wp_enqueue_scripts', 'childhood_styles' ); 
    add_action( 'wp_enqueue_scripts', 'childhood_scripts' ); //создаем хук, когда начнет выполняться стандартный wp_enqueue_scripts, тогда же запутится наш childhood_scripts

    function childhood_styles() {
        wp_enqueue_style('childhood-style', get_stylesheet_uri()); // запускаем стили. childhood-style - название файла со стилями, get_stylesheet_directory_uri - подключаем style.css стандартным вордпрессовским методом
        }

    function childhood_scripts() {
        wp_enqueue_script( 'childhood-script', get_template_directory_uri() . '/assets/js/main.min.js', array(), null, true ); // get_template_directory_uri - путь до темы + продолжение пути до файла скрипта, array('jquery') - зависимость, запустится тогда же, когда и jquery, null - версия скрипта, true - будет подключаться в футере(да/нет)

        //переподключаем самый последний jquery
        wp_deregister_script( 'jquery' );
        wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.min.js' );
        wp_enqueue_script('jquery');
    }
    add_theme_support('custom-logo'); //включена возможность добавлять кастомное лого
    add_theme_support('post-thumbnails'); //включена "установить изображение записи" в постах, которую можно нахначить фоном для превью карточки товара на главной
    add_theme_support('menus'); //Выводит произвольное меню, созданное в админ-панели: "внешний вид > меню" (Appearance > Menus).

    function my_acf_google_map_api( $api ){ // регистрирую апи для карты
        $api['key'] = 'AIzaSyCsLztfO7Xke22AAKUzuo5BwvKBNvDqsTQ';
        return $api;
    }
    add_filter('acf/fields/google_map/api', 'my_acf_google_map_api'); // в итоге запили карты тупо через ссылку из гугл мапс
    add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);//при событии нав линк меню атрибутс в функцию будет записываться 3 динамически формирующихся атрибута. Приоритет хука 10 (стандарт)
    function filter_nav_menu_link_attributes($atts, $item, $args) {
        //здесь достукиваемся до атрибутов из меню в header.php
        if($args->menu === 'Main'){
            $atts['class'] = 'header__nav-item'; //добавляем к каждому айтему класс header__nav-item
            if($item->current){ //усли мы находимся на каррент странце, то к ссылке добавляется класс header__nav-item-active
                $atts['class'] .= ' header__nav-item-active'; //теперь у текущей ссылки 2 класса. 
            }
            // вычисляем ID категории игрушек и если мы в ней и категория равна soft_toys или edu_toys, то ссылка в меню "Игрушки" подсвечивается жирным
            // print_r($item); // здесь ищеи ID категории игрушек в меню
            if($item->ID === 184 && (in_category( 'soft_toys' ) || in_category('edu_toys'))){
                $atts['class'] .= ' header__nav-item-active';
            }

        };

        return $atts;
    }
?>