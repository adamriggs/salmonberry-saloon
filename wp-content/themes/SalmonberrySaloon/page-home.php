<?php
    get_header();
?>

<?php

    $menu = get_field('menu');

    // echo('<pre>');
    // print_r($menu);
    // echo('</pre>');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main home" role="main">

        <section class="home__primary row center middle">

            <img class="home__primary__hero col-12" src="<?php echo get_template_directory_uri() . '/images/hero.svg' ?>">
            <div class="arrow__container">
                <div class="arrow__down col-12">
                    <img src="<?php echo get_template_directory_uri() . '/images/arrow-down.svg' ?>">
                </div>
            </div>

        </section>

        <section class="home__secondary">
            <div class="home__secondary__menu">
                <?php echo $menu; ?>
            </div>
        </section>

    </main>
</div>

<?php get_footer(); ?>
