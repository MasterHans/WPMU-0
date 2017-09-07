<?php

if(!function_exists('ratio_edge_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function ratio_edge_is_responsive_on() {
        return ratio_edge_options()->getOptionValue('responsiveness') !== 'no';
    }
}