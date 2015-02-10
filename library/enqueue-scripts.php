<?php

if (!function_exists('FoundationPress_scripts')) :
  function FoundationPress_scripts() {

    // deregister the jquery version bundled with wordpress
    wp_deregister_script( 'jquery' );

    // register scripts - header
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '1.0.0', false );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '1.0.0', false );

    // register scripts - footer
    wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.js', array('jquery'), '1.0.0', true );
	
    // enqueue scripts
    wp_enqueue_script('modernizr');
    wp_enqueue_script('jquery');
    wp_enqueue_script('foundation');

  }

  add_action( 'wp_enqueue_scripts', 'FoundationPress_scripts' ,5);
endif;


if (!function_exists('FoundationPress_js_script')) :
function FoundationPress_js_script() {
?>
<script type="text/javascript">

if ( undefined !== window.jQuery ) {

  jQuery( document ).ready(function( $ ) {

		(function( $ ) {

			$(document).foundation();

		})(jQuery);

	})
}

</script>
<?php
}
add_action( 'wp_footer', 'FoundationPress_js_script',10);
endif;

?>
