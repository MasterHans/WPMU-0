<?php

if (!function_exists('ratio_edge_register_widgets')) {

	function ratio_edge_register_widgets() {

		$widgets = array(
//			'RatioEdgeFullScreenMenuOpener',
			'RatioEdgeLatestPosts',
			'RatioEdgeSearchOpener',
			'RatioEdgeSideAreaOpener',
			'RatioEdgeStickySidebar',
			'RatioEdgeSocialIconWidget',
			'RatioEdgeSeparatorWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'ratio_edge_register_widgets');