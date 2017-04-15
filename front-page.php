<?php get_header(); ?>
   
   <!-- Begin Flex Slider -->
    <div class="flexslider">
        <ul class="slides">
        <li><img src="<?php bloginfo('template_directory'); ?>/images/img-slide-01.jpg" width="940" height="400" alt="Image One"></li>
        <li><img src="<?php bloginfo('template_directory'); ?>/images/img-slide-02.jpg" width="940" height="400" alt="Image Two"></li>
        <li><img src="<?php bloginfo('template_directory'); ?>/images/img-slide-03.jpg" width="940" height="400" alt="Image Three"></li>
        </ul>
    </div>
    <!-- End Flex Slider -->
    
    <!-- Begin Widgets -->
    <div id="widgets">
        <section class="widget-item">
            <h2>About Me:</h2>
            <?php while( have_posts() ) : the_post(); // loop one ?>
            <?php the_content(); ?>
            <?php endwhile; ?>
        </section>
        <section class="widget-item">
            <h2>Latest Postings:</h2>
            <?php rewind_posts(); ?>
            <?php query_posts('page_id=14'); ?>
            <ul>
            <?php while( have_posts() ) : the_post(); // loop two ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php echo substr(get_the_content( ), 0 , 150); ?>
            <?php endwhile; ?>
            </ul>
        </section>
        <section class="widget-item">
            <h2>Contact Me:</h2>
            <p><strong>Phone: </strong>206.543.2567<br><strong>Email: </strong><a href="mailto:sinkum@uw.edu">sinkum@uw.edu</a></p>
            <p>428 Sieg Hall<br>University of Washington<br>Seattle, WA 98195</p> 
        </section>
    </div>
    <!-- End Widgets -->
   
    <small>front-page.php</small>

    
<?php get_footer(); ?>