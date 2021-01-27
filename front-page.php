<?php get_header(); ?>    

    <main>
        <section class="hero">
            <div class="grid-container">
                <div class="grid-x grid-padding-x align-middle">
                    <div class="cell small-12 medium-5">
                        <h1><?php the_field('titre_intro'); ?></h1>
                        <?php the_field('text_intro'); ?>
                        <?php $link = get_field('btn_intro');
                        if($link){
                        ?>
                        <a class="btn btn_menthe" href="<?php echo esc_url( $link[url] ); ?>"><?php echo esc_html( $link[title] ); ?></a>
                        <?php } ?>
                    </div>
                    <div class="cell small-12 medium-7">
                        <div class="video">
                            <a data-fancybox href="<?php the_field('lien_youtube_intro'); ?>&amp;;autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/play-button.svg" alt="vidéo de présentation Auberge Arc en ciel">
                            </a>
                        </div>
                        <div class="round">
                            <?php $image = get_field('img_intro'); ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    </div>
                </div>  
            </div>
        </section>        
        <section class="section_services">
            <div class="epice_1 rellax" data-rellax-speed="-2"><img src="<?php echo get_template_directory_uri(); ?>/img/bol-epices.png" alt=""></div>
            <div class="epice_2 rellax" data-rellax-speed="1"><img src="<?php echo get_template_directory_uri(); ?>/img/feuille-epice.png" alt=""></div>
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <div class="titre_section text-center">
                            <!-- <span>L'auberge</span> -->
                            <h2><?php the_field('titre_concept'); ?></h2>
                        </div>
                    </div>                    
                    <?php

                    // Check rows exists.
                    if( have_rows('blocks') ):

                        // Loop through rows.
                        while( have_rows('blocks') ) : the_row();

                            // Load sub field value.
                            // $sub_value = get_sub_field('sub_field');
                            $link = get_sub_field('lien_block');
                            // Do something... ?>
                            <div class="cell medium-3">
                                <div class="services">
                                    <h3><?php the_sub_field('titre_block'); ?></h3>
                                    <?php the_sub_field('texte_block'); ?>
                                    <?php if($link){?>
                                        <a href="<?php echo esc_url( $link[url] ); ?>" class="btn btn_small"><?php echo esc_html( $link[title] ); ?></a>                                        
                                    <?php } ?>
                                </div>
                            </div>

                        <?php // End loop.
                        endwhile;

                    endif; ?>
                </div>
                <!-- <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <div class="text-center">
                            <a href="<?php echo get_permalink(9); ?>" class="btn btn_vert">je découvre l'auberge</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        <section>
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell">
                    <div class="titre_section text-center">
                        <!-- <span>C'est aussi</span> -->
                        <h2>les chambres d’hôtes</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-container fluid">
            <div class="grid-x grid-padding-x align-middle">
                <div class="cell small-12 medium-12 large-6">
                    <div class="grid-x grid-padding-xh">
                        <div class="cell small-12 medium-6 large-5 les_chambres">
                            <div class="chambres text-right">
                                <h3>Toutes nos chambres</h3>
                                <div>
                                    <a href="<?php echo home_url( '/chambres' ); ?>" class="btn btn_small btn_white">&#8594;</a>
                                </div>
                            </div>
                        </div>
                        <div class="cell small-12 medium-6 large-7 bg_linear">
                            <div class="petit-dejeuner text-right">
                                <h3>Les formules petit-déjeuner</h3>
                                <div>
                                    <a href="<?php echo home_url( '/chambres' ); ?>" class="btn btn_small btn_white">plus d'infos &#8594;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell small-12 medium-12 large-6">
                    <div class="owl-carousel owl-theme">
                    
                        <?php $loop = new WP_Query( array( 'post_type' => 'chambres') ); ?>
                        
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="item">
                                <a href="<?php the_permalink(); ?>" class="bg" style='background-image:url("<?php the_post_thumbnail_url(); ?>")'>
                                    <h3 class="<?php the_field('theme') ?>"><?php the_title(); ?></h3>
                                </a>
                            </div>
                        <?php endwhile ;
                        wp_reset_query();?>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <section>
            <div class="grid-container">
                <div class="grid-x grid-padding-x align-right">
                <div class="cell">
                    <div class="titre_section text-center">
                        <!-- <span>C'est aussi</span> -->
                        <h2><?php the_field('titre_aussi'); ?></h2>                        
                    </div>
                </div>
                <?php

                    // Check rows exists.
                    if( have_rows('blocks_') ):

                        // Loop through rows.
                        while( have_rows('blocks_') ) : the_row();

                            // Load sub field value.
                            // $sub_value = get_sub_field('sub_field');
                            $link = get_sub_field('lien_block');
                            // Do something... ?>
                            <div class="cell medium-4">
                                <div class="services">
                                    <h3><?php the_sub_field('titre_block'); ?></h3>
                                    <?php the_sub_field('texte_block'); ?>
                                    <?php if($link){?>
                                        <a href="<?php echo esc_url( $link[url] ); ?>" class="btn btn_small"><?php echo esc_html( $link[title] ); ?></a>                                        
                                    <?php } ?>
                                </div>
                            </div>

                        <?php // End loop.
                        endwhile;

                    endif; ?>
                <!-- <div class="cell medium-4">
                    <div class="services">
                        <h3>S'amuser & se divertir</h3>
                        <p>Pour vous amuser ou vous divertir, l’Auberge organise des <b>soirées thématiques</b> et des animations.</p>
                    </div>
                </div>                    
                <div class="cell medium-4">
                    <div class="services">
                        <h3>Profiter de la région</h3>
                        <p>Et à ceux qui souhaitent profiter de la région quelques jours ou lors d’un week-end, les <b>chambres d’hôtes</b> sont là pour vous accueillir.</p>
                        <a href="<?php echo get_permalink(17); ?>" class="btn btn_small">Les chambres</a>
                    </div>
                </div> -->
                </div>
            </div>
        </section>        
        <section>
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <div class="titre_section text-center">
                            <span>Actus</span>
                            <h2>Les derniers posts</h2>
                        </div>
                        <?php echo do_shortcode('[custom-facebook-feed]')?>
                    </div>
                </div>
            </div>            
        </section>
    </main>


    <aside class="site__sidebar">
        <ul>
            <?php dynamic_sidebar( 'widget-1' ); ?>
        </ul>
    </aside>

<?php get_footer(); ?>

<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayHoverPause:true,
    margin:20,
    center:true,
    // nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
    }
})
</script>