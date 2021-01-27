<?php get_header(); ?>

<section>
    <div class="grid-container">
        <div class="grid-x"> 
            <div class="cell">
                <div class="titre_section text-center">
                    <!-- <span>C'est aussi</span> -->
                    <h1>les chambres d’hôtes</h1>
                </div>
            </div>
            <?php
                $number = 0;
                // $check = "coucou";
                function check($number){ 
                    if($number % 2 == 0){ 
                        echo $check = "flex-dir-row-reverse";  
                    } 
                    else{ 
                        echo $check = ""; 
                    } 
                } 
            ?>           
            <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php $number += 1;
            // check($number);
            ?>
            <div class="cell <?php the_field('theme') ?>">
                <div class="grid-x align-middle <?php check($number); ?>">
                    <div class="tarif">
                        <?php the_field('tarif'); ?> €
                        <span>la nuitée</span>
                    </div>
                    <div class="cell small-12 medium-6">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="cell small-12 medium-6">
                        <div class="content">
                            <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>    
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>