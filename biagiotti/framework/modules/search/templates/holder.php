<div class="mkdf-grid-row">
	<div <?php echo biagiotti_mikado_get_content_sidebar_class(); ?>>
		<div class="mkdf-search-page-holder">
			<?php biagiotti_mikado_get_search_page_layout(); ?>
		</div>
		<?php do_action( 'biagiotti_mikado_page_after_content' ); ?>
	</div>
	<?php if ( $sidebar_layout !== 'no-sidebar' ) { ?>
		<div <?php echo biagiotti_mikado_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>