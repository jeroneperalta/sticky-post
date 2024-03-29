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
add_action( 'wp_enqueue_scripts', 'sticky_post_scripts', 9999 ); 

/* 
 * Shortcode - Sticky Post
 */
function sticky_post_shortcode( $atts ) {

    $attributes = shortcode_atts( array(
        'post_type' => 'post',
        'theme'  =>  'light'
    ), $atts );

    $ret_post_type = $attributes['post_type'];
    $ret_theme = $attributes['theme'];

    ob_start();

        $args = array(
            'post_type' => $ret_post_type,
            'posts_per_page' => 1,
            'orderby'        => 'rand',
        );
        
        $loop = new WP_Query( $args );
        ?>
        
        <?php 
        while ( $loop->have_posts() ) : $loop->the_post(); 
        $title = get_the_title();
        $ret_title = ( $title ) ? $title : 'Anonymous' ;
        $rating = get_field( 'rating' );
        $location = get_field( 'location' );
        $content = get_post()->post_content;
        ?>
        
            <div id="sticky-post" class="sticky-post <?php echo $ret_theme ; ?>">
                <div class="sticky-post--inner">
                    <div class="sticky-post--header">
                        <div class="sticky-post--header-inner">
                            <div class="sticky-post--thumbnail-wrapper">

                                <?php 
                                if ( has_post_thumbnail() ) : 
                                $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail');
                                ?>
                                    <div class="sticky-post--thumbnail" style="background-image: url(<?php echo $image_url[0]; ?>)"></div>
                                <?php else : ?>

                                    
                                    <div class="sticky-post--thumbnail-placeholder placeholder-text-value">
                                        <div class="placeholder-text-source"><?php echo $ret_title; ?></div>
                                        <div class="placeholder-text-value"></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="sticky-post--details">
                                <p class="sticky-post--name">
                                    <?php echo $ret_title; ?>
                                </p>
                                <?php if ( $location ) : ?>
                                    <p class="sticky-post--location">
                                        <?php echo get_field( 'location' ); ?>
                                    </p>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                        <?php if ( $content !== '' ) : ?>
                            <button id="sticky-post--accordion-button" class="sticky-post--accordion-button minimize"></button>
                        <?php endif; ?>
                    </div>
                    <?php if ( $content !== '' ) : ?>
                        <div id="sticky-post--accordion-content" class="sticky-post--accordion-content">
                            <div>
                                <?php echo $content; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ( $rating ) : ?>
                        <div class="sticky-post--footer">
                            <ul class="sticky-post-rating-items value">
                                <?php for ( $x = 0; $x < $rating; $x++ ) : ?>
                                    <li class="sticky-post-rating-item">★</li>
                                <?php endfor; ?>
                            </ul>
                            <ul class="sticky-post-rating-items full">
                                <?php for ( $x = 0; $x < 5; $x++ ) : ?>
                                    <li class="sticky-post-rating-item">★</li>
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
