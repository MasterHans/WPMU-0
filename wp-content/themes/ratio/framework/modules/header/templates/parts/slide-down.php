<div class="edgtf-slidedown-menu-holder-outer">
	<div class="edgtf-slidedown-menu-holder">
		<div class="edgtf-slidedown-menu-holder-inner clearfix">
			<a href="javascript:void(0)" class="edgtf-slidedown-menu-close">
				<i class="edgtf-line edgtf-line-3-x"></i>
				<i class="edgtf-line edgtf-line-5-x"></i>
			</a>
			<div class="edgtf-slidedown-logo-holder edgtf-slidedown-part">
				<div class="edgtf-slidedown-part-inner">
					<div class="edgtf-slidedown-logo-wrapper">
						<a href="<?php echo esc_url(home_url('/')); ?>" <?php ratio_edge_inline_style($logo_styles); ?>>
							<img class="edgtf-normal-logo" src="<?php echo esc_url($logo_image); ?>" alt="logo"/>
						</a>
					</div>
				</div>
			</div>
			<?php
			//Navigation
			ratio_edge_get_slide_down_menu_navigation();

			//Sidearea under menu
			if(is_active_sidebar('edgtf-right-in-slide-down-menu')) : ?>
				<div class="edgtf-slidedown-right-widget-holder edgtf-slidedown-part">
					<div class="edgtf-slidedown-part-inner">
						<?php dynamic_sidebar('edgtf-right-in-slide-down-menu'); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>