<?php
/**
 * Service section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */
if ( ! function_exists( 'officepress_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since OfficePress 1.0.0
    */
    function officepress_add_service_section() {
    	$options = officepress_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'officepress_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'officepress_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        officepress_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'officepress_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since OfficePress 1.0.0
    * @param array $input service section details.
    */
    function officepress_get_service_section_details( $input ) {
        $options = officepress_get_theme_options();

        $content = array();
        $page_ids = array();
        $icons = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['service_content_page_' . $i] ) ) :
                $page_ids[] = $options['service_content_page_' . $i];
                $icons[] = ! empty( $options['service_content_icon_' . $i] ) ? $options['service_content_icon_' . $i] : 'fa-cogs';
            endif;
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                $i = 0;
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['icon']      = ! empty( $icons[ $i ] ) ? $icons[ $i ] : 'fa-cogs';
                    $page_post['excerpt']   = officepress_trim_content( 20 );

                    // Push to the main array.
                    array_push( $content, $page_post );
                    $i++;
                endwhile;
            endif;
            wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// service section content details.
add_filter( 'officepress_filter_service_section_details', 'officepress_get_service_section_details' );


if ( ! function_exists( 'officepress_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since OfficePress 1.0.0
   *
   */
   function officepress_render_service_section( $content_details = array() ) {
        $options = officepress_get_theme_options();
        $i = 1;        

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="our-services" class="relative page-section">
            <div class="wrapper">
                <div class="services-list-wrapper clear col-3">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="service-item">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><i class="fa <?php echo esc_attr( $content['icon'] ); ?>"></i></a>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->
                            </div><!-- .service-item -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .services-list-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #our-services -->

    <?php }
endif;