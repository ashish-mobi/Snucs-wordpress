<section class="mkdf-side-menu">
	<a <?php biagiotti_mikado_class_attribute( $close_icon_classes ); ?> href="#">
		<?php echo biagiotti_mikado_get_icon_sources_html( 'side_area', true ); ?>
	</a>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
	
	<?php if ( is_active_sidebar( 'sidearea-bottom' ) ) {
		dynamic_sidebar( 'sidearea-bottom' );
	} ?>
</section>