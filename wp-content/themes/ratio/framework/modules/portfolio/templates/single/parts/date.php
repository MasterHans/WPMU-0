<?php if(ratio_edge_options()->getOptionValue('portfolio_single_hide_date') !== 'yes') : ?>

    <div class="edgtf-portfolio-info-item edgtf-portfolio-date">
        <h4><?php esc_html_e('Date:', 'ratio'); ?></h4>

        <p><?php the_time(get_option('date_format')); ?></p>
    </div>

<?php endif; ?>