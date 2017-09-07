<?php
	if(!function_exists('ratio_edge_layerslider_overrides')) {
		/**
		 * Disables Layer Slider auto update box
		 */
		function ratio_edge_layerslider_overrides() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		add_action('layerslider_ready', 'ratio_edge_layerslider_overrides');
	}
?>