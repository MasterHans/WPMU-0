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

				<div class="service-listing">
					<?php
					global $query_string; // параметры базового запроса
					query_posts($query_string . '&orderby=date&order=ASC');
					if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<div class="col-md-4 column">
								<div class="service-block">
									<div class="service-image">
										<?php echo the_post_thumbnail( [355,148] ); ?>
										<i class="fa fa-book"></i>
									</div>
									<h3><?php the_title() ?></h3>
									<?php the_excerpt(); ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else : ?>
						<div class="search-result">в эту рубрику пока ничего не написано.</div>
					<?php endif; wp_reset_query() ?>
				</div>
			</div>

			<div class="theme-pagination">
				<?php kriesi_pagination(); ?>
			</div>

		</div>
	</div>
</section>


<?php get_footer() ?>