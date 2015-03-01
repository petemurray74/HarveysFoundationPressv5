<?php
function show_harveys_footer() {
?>
<div class="harveys-foot-wrap">
    <div class="row">
        <div class="large-4 small-12 columns">
            foot1
        </div>
        <div class="large-4 small-12 columns">
            foot2
        </div>
                <div class="large-4 small-12 columns">
            foot3
        </div>
    </div>
</div>


<?php    
}
add_action( 'foundationPress_layout_end', 'show_harveys_footer' );
?>

