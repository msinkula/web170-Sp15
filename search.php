<?php get_header(); ?>

    <!-- Begin Content -->
    <div id="content">
    <?php if ( have_posts() ) : while( have_posts() ) : the_post(); // start the loop ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_content(''); ?>
    <?php endwhile; endif; // end the loop ?>
    <small>search.php</small>
    </div>
    <!-- End Content -->
    
<?php get_sidebar(); ?>   
<?php get_footer(); ?>