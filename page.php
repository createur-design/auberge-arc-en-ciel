<?php get_header(); ?>

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    	<h1><?php the_title(); ?></h1>
    
    	<?php the_content(); ?>

	<?php endwhile; endif; ?>

    <aside class="site__sidebar">
        <ul>
            <?php dynamic_sidebar( 'widget-1' ); ?>
        </ul>
    </aside>

<?php get_footer(); ?>