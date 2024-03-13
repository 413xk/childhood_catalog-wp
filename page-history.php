<?php
/*
Template Name: Наша история
*/
?>

<?php get_header(); ?>


<div class="aboutus">
    <div class="container">
        <h1 class="title"><?php the_field('history_title'); ?></h1>
        <div class="row">
            <div class="col-lg-6">
                <div class="subtitle">
                    <?php the_field('history_subtitle1'); ?>
                </div>
                <div class="aboutus__text">
                    <?php the_field('history_text1'); ?>
                </div>
            </div>
            <div class="col-lg-6">
                
                <?php
                    $image = get_field('history_img1');
                    if (!empty($image)): 
                ?>
                    <img class="aboutus__img" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                <?php
                endif;
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
            <?php
                    $image = get_field('history_img2');
                    if (!empty($image)): 
                ?>
                    <img class="aboutus__img" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                <?php
                endif;
                ?>
            </div>
            <div class="col-lg-6">
                <div class="subtitle">
                    <?php the_field('history_subtitle2'); ?>
                </div>
                <div class="aboutus__text">
                    <?php the_field('history_text2'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="subtitle">
                    <?php the_field('history_subtitle3'); ?>
                </div>
                <div class="aboutus__text">
                    <?php the_field('history_text3'); ?>
                </div>
            </div>
            <div class="col-lg-6">
            <?php
                $image = get_field('history_img3');
                if (!empty($image)): 
            ?>
                <img class="aboutus__img" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
            <?php
            endif;
            ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>