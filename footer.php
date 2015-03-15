</section>
<aside class="row">
	<?php do_action('foundationPress_before_footer'); ?>
	<?php dynamic_sidebar("footer-widgets"); ?>
	<?php do_action('foundationPress_after_footer'); ?>
</aside>
<a class="exit-off-canvas"></a>

	<?php 
    get_template_part('parts/footer-area');
    do_action('foundationPress_layout_end');
    ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action('foundationPress_before_closing_body'); ?>
</body>
</html>
