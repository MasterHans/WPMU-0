<!--1 "миниатюра записи" размер 355,148 формируется автоматически-->
<!--2 "миниатюра записи средний размер" обрезать вручную до размеров 468,320 -->
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
		<div id="individualnyiy-podhod" ></div>
	</div>
</div>
			<?php
			global $query_string; // параметры базового запроса
			query_posts($query_string . '&meta_key=post_sort_num&orderby=meta_value_num&order=ASC');

			if ( have_posts()) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<section>
						<?php if ( 1 == get_post_meta($post->ID,'post_sort_num',true) ) {?>
							<div class="block">
						<?php } else {?>
							<div class="block remove-gap">
						<?php } ?>
								<div class="container">
									<div class="row">
										<?php if ( 0 != get_post_meta($post->ID,'post_sort_num',true)%2 ) {?>
											<div class="title4"><h2 class="block-header"><?php the_title(); ?></h2></div>
											<div class="col-md-5 column">
												<div class="single-page">
													<?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'middle-size-image', NULL, NULL); ?>
												</div><!-- PHOTO -->
											</div>

											<div class="col-md-7 column">
												<div class="content-text">
													<?php the_content(); ?>
												</div>
											</div>
										<?php } else {?>
											<div class="title4"><h2 class="block-header"><?php the_title(); ?></h2></div>
											<div class="col-md-7 column">
												<div class="content-text">
													<?php the_content(); ?>
												</div>
											</div>

											<div class="col-md-5 column">
												<div class="single-page">
													<?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'middle-size-image', NULL, NULL); ?>
												</div><!-- PHOTO -->
											</div>
										<?php } ?>
									</div>
								</div>
							<?php if ( !empty( get_post_meta($post->ID,'next_post_slug',true) ) ) {?>
								<div id="<?php echo get_post_meta($post->ID,'next_post_slug',true) ?>"></div>
							<?php } ?>

						</div>
					</section>

				<?php endwhile; ?>
			<?php else : ?>
				<div class="search-result">в эту рубрику пока ничего не написано.</div>
			<?php endif; wp_reset_query(); // сбрасываем переменную $post ?>

<?php get_footer() ?>