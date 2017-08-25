<?php get_header() ?>
<div class="page-top">
	<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax1.jpg);"></div>
	<div class="container">
		<?php
		/*Выделить последнее слово в названии*/
		$cat_name = single_cat_title(null,0);
		$cat_name_arr = explode(' ', $cat_name);
		$cat_name_last_word = array_pop($cat_name_arr);
		$cat_others_words = implode(' ',$cat_name_arr);
		?>
		<h1><?php echo $cat_others_words; ?> <span><?php echo $cat_name_last_word; ?></span></h1>
		<ul>
			<?php the_breadcrumb(); ?>
		</ul>
	</div>
</div><!--- PAGE TOP -->

<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-md-8 column">
					<div class="events-gridview remove-ext">  
						<div class="row">
							<?php if (have_posts()) : ?>
								<?php while (have_posts()) : the_post(); ?>
									<div class="col-md-6">
										<div class="category-box">
											<div class="category-block">
												<div class="category-img">
													<?php echo the_post_thumbnail( [370,164] ); ?>
													<ul>
														<li class="date"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-calendar-o"></i><?php the_time('j M. Y') ?></a></li>
														<li class="time"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-clock-o"></i><?php the_time('G i') ?></a></li>
													</ul>
												</div>
												<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
												<?php
													$options = get_option('sample_theme_options');

												if ( !empty( get_post_meta($post->ID,'event_address',true) ) ) {
													$address = get_post_meta($post->ID,'event_address',true);
												} else {
													$address = $options['shortaddresstext'];
												}
												?>
												<span><i class="fa fa-map-marker"></i><?php echo $address; ?></span>
<!--												<span>--><?php //the_excerpt(); ?><!--</span>-->
											</div>
										</div><!-- EVENTS -->
									</div>

								<?php endwhile; ?>
							<?php else : ?>
								<div class="search-result">в эту рубрику пока ничего не написано.</div>
							<?php endif;  ?>
						</div>
					</div><!-- EVENTS GRID VIEW -->

					<div class="theme-pagination">
						<?php kriesi_pagination(); ?>
					</div>
					
				</div>

				<?php get_sidebar('cats-zhizn-tsentra'); ?>

			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>