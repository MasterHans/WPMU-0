<?php

//top header bar
add_action('ratio_edge_before_page_header', 'ratio_edge_get_header_top');

//mobile header
add_action('ratio_edge_after_page_header', 'ratio_edge_get_mobile_header');