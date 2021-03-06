<?php
    wp_enqueue_script('main', get_template_directory_uri() . '/dist/home-bundle.js', [], time());
    get_header();
?>

<?php

    $menu = get_field('menu');

    $producers_field = get_field('our_producers');
    $producers_image = $producers_field['image'];
    $producers_title = $producers_field['title'];
    $producers = $producers_field['producers'];

    $name = get_field('name', 'option');
    $address = get_field('address', 'option');
    $phone = get_field('phone', 'option');
    $email = get_field('email', 'option');
    $map = get_field('map', 'option');
    $gift_card = get_field('gift_card_form', 'option');

    $salmonberry_commons = get_field('salmonberry_commons');
    $sbc_image = $salmonberry_commons['image']['url'];
    $sbc_link_text = $salmonberry_commons['link_text'];
    $sbc_link_url = $salmonberry_commons['link_url'];

    $slideshow = get_field('slideshow');

    $show_order = get_field('show_order_online_button');

    // echo('<pre>');
    // print_r($show_order);
    // echo('</pre>');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main home" role="main">

        <section class="home__primary center middle">

            <img class="home__primary__hero col-12" src="<?php echo get_template_directory_uri() . '/images/hero.svg' ?>">

            <div class="arrow__container">
                <div class="arrow__down">
                    <img src="<?php echo get_template_directory_uri() . '/images/arrow-down.svg' ?>">
                </div>
            </div>

        </section>

        <section class="home__secondary">
            <div class="home__secondary__menu">
                <!-- <div class="order__now middle"><a href="tel:<?php echo $phone; ?>" class="button">Order Now</a></div> -->
                <?php
                    if($show_order) {
                ?>
                <button class="order__now middle upserve-olo-button upserve-olo-opener">Order Online</button>
                <?php
                    }
                ?>

                <?php echo $menu; ?>
                <!-- <div class="order__now middle"><a href="tel:<?php echo $phone; ?>" class="button">Order Now</a></div> -->
            </div>
        </section>

        <section class="home__tertiary">

            <div class="home__tertiary__container">
                <div class="home__tertiary__title row middle">
                    <div class="col-4 end">
                        <img src="<?php echo $producers_image['url']; ?>">
                    </div>
                    <div class="col-4">
                        <h1 class="black"><?php echo $producers_title; ?></h1>
                    </div>
                    <div class="col-4">

                    </div>
                </div>

                <div class="home__tertiary__producers">
                    <?php
                        foreach($producers as $producer) {
                            $producer = $producer['producer'];
                            $id = $producer->ID;
                    ?>
                            <div class="home__tertiary__producer row">
                                <div class="home__tertiary__producer__image col-4">
                                    <?php echo get_the_post_thumbnail($id, 'medium'); ?>
                                </div>

                                <div class="home__tertiary__producer__content col-8">
                                    <?php echo apply_filters('the_content', $producer->post_content); ?>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>

        <section class="home__quaternary">

            <div class="home__quaternary__slideshow">
                <?php echo do_shortcode($slideshow); ?>
            </div>

            <div class="home__quaternary__contact row">
                <div class="home__quaternary__contact__title col-12 middle"><h3 class="yellow">Contact Us</h3></div>
                <div class="row middle center">
                    <div class="col-3">
                        <a href="mailto:<?php echo $email; ?>" target="_blank"><h3 class="white">Email</h3></a>
                    </div>

                    <div class="col-3">
                        <a href="<?php echo $map; ?>" target="_blank"><h3 class="white">Map</h3></a>
                    </div>

                    <div class="col-3">
                        <a href="tel:<?php echo $phone; ?>"><h3 class="white">Call</h3></a>
                    </div>

                    <div class="col-3">
                        <a class="gift-card__popup"><h3 class="white">Gift Cards</h3></a>
                    </div>

                    <div class="pop-up pop-up--hide gift-card__popup__modal">
                        <div class="pop-up--close row end">???</div>
                        <?php echo do_shortcode($gift_card); ?>
                    </div>
                </div>
            </div>

            <div class="home__quaternary__commons row center middle">
                <div class="col-8">
                    <a href="<?php echo $sbc_link_url; ?>" target="_blank"><img src="<?php echo $sbc_image; ?>"></a>
                </div>
                <div class="col-8">
                    <a href="<?php echo $sbc_link_url; ?>" target="_blank"><h3 class="yellow"><?php echo $sbc_link_text; ?></h3></a>
                </div>

            </div>

    </main>
</div>

<script src='https://app.upserve.com/platform/olo-widget.js?salmonberry-saloon-wheeler' type='text/javascript' id='upserve-olo-script'></script>

<?php get_footer(); ?>
