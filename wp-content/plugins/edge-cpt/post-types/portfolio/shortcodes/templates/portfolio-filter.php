<div class="edgtf-portfolio-filter-holder <?php echo esc_attr($masonry_filter) ?>">
    <div class="edgtf-portfolio-filter-holder-inner">
        <?php $rand_number = rand(); ?>
        <?php if (is_array($filter_categories) && is_array($filter_categories['parent_categories']) && count($filter_categories['parent_categories'])) { ?>
        	<h6 class="edgtf-filter-heading"><?php esc_html_e('Filter:','edge-cpt');?></h6>
            <ul class="edgtf-portfolio-filter-parent-categories clearfix"
                data-class="filter_<?php print $rand_number ?>">
                <?php
                $data_filter = '*';
                if($type === 'standard' || $type === 'gallery'){
                    $data_filter = 'all';
                }
                ?>
                <li class="edgtf-all-filter filter edgtf-parent-filter filter_<?php print $rand_number ?>" data-filter="<?php echo esc_attr($data_filter); ?>"><h6><?php esc_html_e('All','edge-cpt'); ?></h6></li>
                <?php foreach ($filter_categories['parent_categories'] as $parent) { ?>
                    <?php if ($type == 'masonry' || $type == 'pinterest' || $type == 'pinterest-with-space') { ?>
                        <li class="edgtf-parent-filter filter"
                            data-filter="<?php echo esc_attr($filter_categories[$parent->term_id]); ?>"
                            data-group-id="<?php print $parent->term_id ?>"><h6><?php print $parent->name ?></h6>
                        </li>
                    <?php } else { ?>
                        <li class="edgtf-parent-filter filter_<?php print $rand_number ?>"
                            data-filter="<?php echo esc_attr($filter_categories[$parent->term_id]); ?>"
                            data-class="filter_<?php print $rand_number ?>"
                            data-group-id="<?php print $parent->term_id ?>"><h6><?php print $parent->name ?></h6>
                        </li>
                    <?php }
                } ?>
            </ul>
        <?php } ?>

        <?php if (is_array($filter_categories) && is_array($filter_categories['child_categories']) && count($filter_categories['child_categories'])) { ?>
            <div class="edgtf-portfolio-filter-child-categories-holder">
                <?php foreach ($filter_categories['child_categories'] as $child_group) { ?>
                    <ul class="edgtf-portfolio-filter-child-categories clearfix <?php echo esc_attr($single_cat_class) ?>"
                        data-parent-id="<?php print $child_group['id'] ?>">
                        <?php

                        if (is_array($child_group['value']) && count($child_group['value'])) {
                            $children = array();
                            foreach ($child_group['value'] as $child) {
                                $children[] = '.portfolio_category_' . $child->term_id;
                            }
                            $children[] = '.portfolio_category_' . $child_group['id'];
                            $all_array = implode(', ', $children);
                            if ($type == 'masonry' || $type == 'pinterest' || $type == 'pinterest-with-space') { ?>
                                <li class="filter edgtf-filter-all" data-filter="<?php print $all_array; ?>">
                                    <p><?php esc_html_e('All', 'edge-cpt') ?></p></li>
                            <?php } else { ?>
                                <li data-class="filter_<?php print $rand_number ?>"
                                    class="filter_<?php print $rand_number ?> edgtf-filter-all" data-filter="<?php print $all_array; ?>">
                                    <p><?php esc_html_e('All', 'edge-cpt') ?></p></li>
                            <?php }
                            foreach ($child_group['value'] as $child) {
                                if ($type == 'masonry' || $type == 'pinterest' || $type == 'pinterest-with-space') {
                                    ?>
                                    <li data-class="filter" class="edgtf-child-filter filter"
                                        data-filter=".portfolio_category_<?php print $child->term_id ?>">
										<p>
											<?php print $child->name ?>
										</p>
                                    </li>
                                <?php } else { ?>
                                    <li data-class="filter_<?php print $rand_number ?>"
                                        class="edgtf-child-filter filter_<?php print $rand_number ?>"
                                        data-filter=".portfolio_category_<?php print $child->term_id ?>">
										<p>
											<?php print $child->name ?>
										</p>
                                    </li>
                                <?php }
                            }
                        } ?>
                    </ul>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>