<?php get_header(); ?>
				<div class="mkdf-page-not-found">
					<?php
					$mkdf_title_image_404 = biagiotti_mikado_options()->getOptionValue( '404_page_title_image' );
					$mkdf_title_404       = biagiotti_mikado_options()->getOptionValue( '404_title' );
					$mkdf_subtitle_404    = biagiotti_mikado_options()->getOptionValue( '404_subtitle' );
					$mkdf_text_404        = biagiotti_mikado_options()->getOptionValue( '404_text' );
					$mkdf_button_label    = biagiotti_mikado_options()->getOptionValue( '404_back_to_home' );
					$mkdf_button_style    = biagiotti_mikado_options()->getOptionValue( '404_button_style' );
					
					if ( ! empty( $mkdf_title_image_404 ) ) { ?>
						<div class="mkdf-404-title-image">
							<img src="<?php echo esc_url( $mkdf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'biagiotti' ); ?>" />
						</div>
					<?php } ?>
					
					<h1 class="mkdf-404-title">
						<?php if ( ! empty( $mkdf_title_404 ) ) {
							echo esc_html( $mkdf_title_404 );
						} else {
							esc_html_e( '404', 'biagiotti' );
						} ?>
					</h1>
					
					<h3 class="mkdf-404-subtitle">
						<?php if ( ! empty( $mkdf_subtitle_404 ) ) {
							echo esc_html( $mkdf_subtitle_404 );
						} else {
							esc_html_e( 'Page not found', 'biagiotti' );
						} ?>
					</h3>
					
					<p class="mkdf-404-text">
						<?php if ( ! empty( $mkdf_text_404 ) ) {
							echo esc_html( $mkdf_text_404 );
						} else {
							esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'biagiotti' );
						} ?>
					</p>
					
					<?php
						$button_params = array(
							'link' => esc_url( home_url( '/' ) ),
							'text' => ! empty( $mkdf_button_label ) ? $mkdf_button_label : esc_html__( 'Back to home', 'biagiotti' )
						);
					
						if ( $mkdf_button_style == 'light-style' ) {
							$button_params['custom_class'] = 'mkdf-btn-light-style';
						}
						
						echo biagiotti_mikado_return_button_html( $button_params );
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>