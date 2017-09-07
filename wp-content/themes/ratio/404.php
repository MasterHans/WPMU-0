<?php get_header(); ?>

	<?php ratio_edge_get_title(); ?>

	<div class="edgtf-container">
	<?php do_action('ratio_edge_after_container_open'); ?>
		<div class="edgtf-container-inner edgtf-404-page">
			<div class="edgtf-page-not-found clearfix">
				<div class="edgtf-page-not-found-part">
					<span class="edgtf-404-text"><?php esc_html_e('404', 'ratio'); ?></span>
				</div>
				<div class="edgtf-page-not-found-part">
					<h2>
						<?php if(ratio_edge_options()->getOptionValue('404_title')){
							echo esc_html(ratio_edge_options()->getOptionValue('404_title'));
						}
						else{
							esc_html_e('Not found', 'ratio');
						} ?>
					</h2>
					<p>
						<?php if(ratio_edge_options()->getOptionValue('404_text')){
							echo esc_html(ratio_edge_options()->getOptionValue('404_text'));
						}
						else{
							esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'ratio');
						} ?>
					</p>
					<?php
						$params = array();
						if (ratio_edge_options()->getOptionValue('404_back_to_home')){
							$params['text'] = ratio_edge_options()->getOptionValue('404_back_to_home');
						}
						else{
							$params['text'] = "Back to Home Page";
						}
						$params['type'] = 'gradient';
						$params['link'] = esc_url(home_url('/'));
						$params['target'] = '_self';
					echo ratio_edge_execute_shortcode('edgtf_button',$params);?>
				</div>
			</div>
		</div>
		<?php do_action('ratio_edge_before_container_close'); ?>
	</div>
<?php get_footer(); ?>