<section class="edgtf-side-menu right">
	<?php if ($show_side_area_title) {
		ratio_edge_get_side_area_title();
	} ?>
	<?php if(is_active_sidebar('sidearea')) {
		dynamic_sidebar('sidearea');
	} ?>
</section>