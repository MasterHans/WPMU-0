<?php if ( ratio_edge_options()->getOptionValue( 'portfolio_single_hide_pagination' ) !== 'yes' ) : ?>

	<?php
	$back_to_link      = get_post_meta( get_the_ID(), 'portfolio_single_back_to_link', true );
	$nav_same_category = ratio_edge_options()->getOptionValue( 'portfolio_single_nav_same_category' ) == 'yes';
	?>

	<div class="edgtf-portfolio-single-nav">
		<div class="edgtf-portfolio-single-nav-inner">
			<?php if ( get_previous_post() !== '' ) : ?>
				<div class="edgtf-portfolio-prev">
					<?php if ( $nav_same_category ) {
						previous_post_link( '%link', '<span class="icon-arrows-left"></span>', true, '', 'portfolio_category' );
					} else {
						previous_post_link( '%link', '<span class="icon-arrows-left"></span>');
					} ?>
				</div>
			<?php endif; ?>

			<?php if ( $back_to_link !== '' ) : ?>
				<div class="edgtf-portfolio-back-btn">
					<a href="<?php echo esc_url( get_permalink( $back_to_link ) ); ?>">
						<span class="edgtf-portofolio-back-square"></span>
						<span class="edgtf-portofolio-back-square"></span>
						<span class="edgtf-portofolio-back-square"></span>
						<span class="edgtf-portofolio-back-square"></span>
						<span class="edgtf-portofolio-back-square"></span>
						<span class="edgtf-portofolio-back-square"></span>
						<span class="edgtf-portofolio-back-square"></span>
						<span class="edgtf-portofolio-back-square"></span>
						<span class="edgtf-portofolio-back-square"></span>
					</a>
				</div>
			<?php endif; ?>

			<?php if ( get_next_post() !== '' ) : ?>
				<div class="edgtf-portfolio-next">
					<?php if ( $nav_same_category ) {
						next_post_link( '%link', '<span class="icon-arrows-right"></span>', true, '', 'portfolio_category' );
					} else {
						next_post_link( '%link', '<span class="icon-arrows-right"></span>');
					} ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php endif; ?>