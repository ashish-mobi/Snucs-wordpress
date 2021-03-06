<?php if ( $max_num_pages > 1 ) { ?>
	<div class="mkdf-blog-pag-loading">
		<div class="mkdf-blog-pag-bounce1"></div>
		<div class="mkdf-blog-pag-bounce2"></div>
		<div class="mkdf-blog-pag-bounce3"></div>
	</div>
	<?php
	$number_of_pages = $max_num_pages;
	$current_page    = $paged;
	
	if ( $number_of_pages > 1 ) { ?>
		<div class="mkdf-bl-standard-pagination">
			<ul>
				<li class="mkdf-pag-prev">
					<a href="#" data-paged="1">
						<span class="mkdf-pag-next-arrow-left"><?php echo biagiotti_mikado_get_left_arrow_svg(); ?></span>
					</a>
				</li>
				<?php for ( $i = 1; $i <= $number_of_pages; $i ++ ) { ?>
					<?php
					$link_classes = '';
					if ( $current_page == $i ) {
						$link_classes = 'mkdf-pag-active';
					}
					?>
					<li class="mkdf-pag-number <?php echo esc_attr( $link_classes ); ?>">
						<a href="#" data-paged="<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></a>
					</li>
				<?php } ?>
				<li class="mkdf-pag-next">
					<a href="#" data-paged="2">
						<span class="mkdf-pag-next-arrow-right"><?php echo biagiotti_mikado_get_right_arrow_svg(); ?></span>
					</a>
				</li>
			</ul>
		</div>
	<?php }

	$unique_id = rand( 1000, 9999 );
	wp_nonce_field( 'mkdf_blog_load_more_nonce_' . $unique_id, 'mkdf_blog_load_more_nonce_' . $unique_id );
} ?>
