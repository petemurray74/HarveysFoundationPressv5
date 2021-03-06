<?php


// ADDS OPTIONAL BANNER ABOVE PAGE
add_action('foundationpress_before_content','harv_sale_head');
function harv_sale_head()
{
    if (get_field('top_banner') == 'custom'){
			the_field('dept_header_message');
    }
    elseif (get_field('top_banner') == 'generic')
    {
        // add code here to show the banner only if banner post is published
    }
    
    elseif (get_field('top_banner') == 'no')
    {
     // nothing   
    }
}


// ADDS OPTIONAL DEPTARTMENT INFO 
add_action('foundationpress_before_sidebar','harv_dept_info');
function harv_dept_info()
{
    $post_object = get_field('choose_department');

    if( $post_object ): 

        // override $post
        $post = $post_object;
        setup_postdata( $post ); 

        ?>
        <?php the_content(); ?>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
    endif; 
}

// ADDS LOGOS TO AREA BENEATH CONTENT
// note: new action created

add_action('foundationpress_after_page','harv_footer_logos');
function harv_footer_logos() {
$post_object = get_field('logo_footer');

if( $post_object ): 

	// override $post
	$post = $post_object;
	setup_postdata( $post ); 

	?>
    <div>
    	<?php the_content(); ?>
    </div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
	endif; 		
}			
	
// ALLOW SHORTCODES IN WIDGETS
add_filter('widget_text', 'do_shortcode');	
	

// ADD CATEGORIES TAXONOMY TO CONTENT BLOCK CUSTOM POST TYPE
// Register Custom Taxonomy

function harv_add_cats_to_content_block() {
	$labels = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
	);
	register_taxonomy( 'contentblocktype', array( 'content_block' ), $args );
}
add_action( 'init', 'harv_add_cats_to_content_block', 0 );		


/*----ADD GOOGLE ANALYTICS----*/
function ga() 
{
?>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-6452121-1', 'auto');
  <?php echo (readContentGroupMeta()); ?>
  ga('send', 'pageview');

</script>
<?php
}

// ADD GOOGLE ANALYTICS CONTENT GROUPING TO SELECTED PAGES
function readContentGroupMeta()
{
    if ($contentGroup=get_field('product_tracking_code')) {
        if ($contentGroup=="product")
        {
            return "ga('set', 'contentGroup1', 'Product');";
        }
        else {
            return;
        }	
	}
    {
        return;
    }       
}
add_action('wp_head', 'ga','50');


// ADD MAILCHIMP GOALS TO SELECTED PAGES
function MailchimpGoal() 
{
?>
<script type="text/javascript">
	var $mcGoal = {'settings':{'uuid':'d895e6fa1a9957d5236ccd4a0','dc':'us1'}};
	(function() {
		 var sp = document.createElement('script'); sp.type = 'text/javascript'; sp.async = true; sp.defer = true;
		sp.src = ('https:' == document.location.protocol ? 'https://s3.amazonaws.com/downloads.mailchimp.com' : 'http://downloads.mailchimp.com') + '/js/goal.min.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sp, s);
	})(); 
</script>
<?php
}
add_action('wp_head', 'MailchimpGoal','30');


// ADD DEPARTMENT SPECIFIC NEWS
add_action('foundationpress_before_sidebar','harv_dept_news');
function harv_dept_news() {
echo('code here to choose news from this department. could be programmed to disapear after particular date');		
}
?>