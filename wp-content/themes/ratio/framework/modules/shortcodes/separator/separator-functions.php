<?php

if(!function_exists('ratio_edge_get_separator_html')) {
    /**
     * Calls separator shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function ratio_edge_get_separator_html($params = '') {
        $separator_html = ratio_edge_execute_shortcode('edgtf_separator', $params);
        $separator_html = str_replace("\n", '', $separator_html);
        return $separator_html;
    }
}