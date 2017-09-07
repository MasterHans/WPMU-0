<form action="<?php echo esc_url(home_url('/')); ?>" class="edgtf-search-cover" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
			<?php } ?>
			<div class="edgtf-form-holder-outer">
				<div class="edgtf-form-holder">
					<div class="edgtf-form-holder-inner">
						<input type="text" placeholder="<?php esc_html_e('Start typing here...', 'ratio'); ?>" name="s" class="edgt_search_field" autocomplete="off" />
						<div class="edgtf-search-close">
							<a href="javascript:void(0)" >
								<div class="edgtf-search-close-lines">
									<div class="edgtf-line-1"></div>
									<div class="edgtf-line-2"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php if ( $search_in_grid ) { ?>
		</div>
	</div>
	<?php } ?>
</form>