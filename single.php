<?php get_header(); ?>

    <!-- Begin Content -->
    <div id="content">
    <?php if ( have_posts() ) : while( have_posts() ) : the_post(); // start the loop ?>
    <h2><?php the_title(); ?></h2>
    <small>The By line goes here.</small>
    <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
    <?php the_content(''); ?>
    <?php endwhile; endif; // end the loop ?>
    <small>single.php</small>
    </div>
    <!-- End Content -->
    
<?php get_sidebar(); ?>   
<?php get_footer(); ?>