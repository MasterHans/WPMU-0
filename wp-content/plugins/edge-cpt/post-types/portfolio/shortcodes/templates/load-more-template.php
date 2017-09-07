<?php if($query_results->max_num_pages>1){ ?>
	<div class="edgtf-ptf-list-paging">
		<span class="edgtf-ptf-list-load-more">
			<?php 
				echo ratio_edge_get_button_html(array(
					'link' => 'javascript: void(0)',
					'text' => esc_html__('Load more', 'edge-cpt'),
					'type' => 'outline'
				));
			?>
		</span>
		<div class="edgtf-outline">
			<div class="edgtf-line-1"></div>
			<div class="edgtf-line-2"></div>
			<div class="edgtf-line-3"></div>
			<div class="edgtf-line-4"></div>
		</div>
	</div>
<?php }