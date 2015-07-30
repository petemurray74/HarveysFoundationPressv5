<?php


// ADDS OPTIONAL BANNER ABOVE PAGE
add_action('foundationPress_before_content','harv_sale_head');
function harv_sale_head()
{
    if (get_field('dept_header_message') == 'custom'){
            $post_object = get_field('dept_header_message');
                if( $post_object ): 
                    // override $post
                    $post = $post_object;
                    setup_postdata( $post ); 
                    ?>
                    <div>
                        <h3><?php the_content(); ?></h3>
                    </div>
                    <?php 
                    wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                endif;
    }
    elseif (get_field('dept_header_message') == 'generic')
    {
        // add code here to show the banner only if banner post is published
    }
    
    elseif (get_field('dept_header_message') == 'no')
    {
     // nothing   
    }
}


// ADDS OPTIONAL BANNER ABOVE PAGE
add_action('foundationPress_before_sidebar','harv_dept_info');
function harv_dept_info()
{
                if( $department=get_field('choose_department') ): 
                    ?>
                    <div>
                        <?php echo do_shortcode('[content_block id='.$department.']'); ?>
                    </div>
                    <?php 
                endif;
}




?>