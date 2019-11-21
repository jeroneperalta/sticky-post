<?php 
/**
 * Plugin Name: Sticky Post
 * Plugin URI: https://github.com/jeroneperalta/sticky-post
 * Description: A sticky, random post.
 * Version: 1.0
 * Author: Jerone Peralta
 * Author URI: https://github.com/jeroneperalta
 */

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function sticky_post_scripts() {
    wp_enqueue_style( 'sticky-post', plugin_dir_url( __FILE__ ) . 'css/style.css' );
    wp_enqueue_script( 'sticky-post', plugin_dir_url( __FILE__ ) . 'js/app.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'sticky_post_scripts' ); 

/* 
 * Shortcode - Sticky Post
 */
function sticky_post_shortcode( $atts ) {

    ob_start();

        $args = array(
            'post_type' => $atts,
            'posts_per_page' => 1,
            'orderby'        => 'rand',
        );
        
        $loop = new WP_Query( $args );
        ?>
        
        <?php 
        while ( $loop->have_posts() ) : $loop->the_post(); 
        $rating = get_field( 'rating' );
        $location = get_field( 'location' );
        ?>
        
            <div class="sticky-post frosted">
                <div class="sticky-post--inner">
                    <div class="sticky-post--header">
                        <div class="sticky-post--header-inner">
                            <div class="sticky-post--thumbnail-wrapper">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php echo get_the_post_thumbnail( $post, 'sticky-post--thumbnail', array( 'alt' => 'Customer Thumbnial' ) ); ?>
                                <?php else : ?>
                                    
                                    <div class="sticky-post--thumbnail-placeholder placeholder-text-value">
                                        <div class="placeholder-text-source"><?php echo get_the_title(); ?></div>
                                        <div class="placeholder-text-value"></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="sticky-post--details">
                                <p class="sticky-post--name">
                                    <?php echo get_the_title(); ?>
                                </p>
                                <?php if ( $location ) : ?>
                                    <p class="sticky-post--location">
                                        <?php echo get_field( 'location' ); ?>
                                    </p>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                        <a data-toggle="collapse" href="#sticky-post-content" class="sticky-post--accordion-button">
                            <i class="fas fa-chevron-circle-down fa-lg"></i>
                        </a>
                    </div>
                    <div class="sticky-post--accordion-content collapse" id="sticky-post-content">
                            <?php echo get_the_content(); ?>
                    </div>
                    <?php if ( $rating ) : ?>
                        <div class="sticky-post--footer">
                            <ul class="sticky-post-rating-items value">
                                <?php for ( $x = 0; $x < $rating; $x++ ) : ?>
                                    <li class="sticky-post-rating-item">
                                        <i class="fas fa-star text-warning"></i>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                            <ul class="sticky-post-rating-items full">
                                <?php for ( $x = 0; $x < 5; $x++ ) : ?>
                                    <li class="sticky-post-rating-item">
                                        <i class="fas fa-star text-muted"></i>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.sticky-post -->

        <?php endwhile; wp_reset_query();
    return ob_get_clean();
}
add_shortcode( 'sticky_post', 'sticky_post_shortcode');
