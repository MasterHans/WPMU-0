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
				<div class="title4"><h2 id="sertifikat" class="block-header">СЕРТИФИКАТЫ</h2></div>
				<div class="gallery lightbox">
				<?php
				global $query_string; // параметры базового запроса
				query_posts($query_string . '&meta_key=post_sort_num&orderby=meta_value_num&order=ASC');

				if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="col-md-6">
							<div class="service-block">
								<div class="service-image">

										<?php
											$image_id = get_post_thumbnail_id();
											$image_title = get_the_title();
										    $image_url =  MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'full-size-image',NULL,'featured-image-770-500');
										?>

										<a href="<?php echo $image_url ?>" title="<?php echo $image_title ?>"><?php echo the_post_thumbnail( [468,340],['title'=>$image_title]); ?></a>

								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
					<div class="search-result">в эту рубрику пока ничего не написано.</div>
				<?php endif; wp_reset_query(); // сбрасываем переменную $post ?>
				</div><!-- GALLERY ITEM -->

			</div>
		</div>
	</div>
</section>

<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<div id="dogovor">
					<div class="dogovor-header">
						<div class="title4" id="dogovor-na-postupl"><h2 class="block-header">ДОГОВОР-ЗАЯВЛЕНИЕ НА ПОСТУПЛЕНИЕ</h2></div>
					</div>

					<div class="service-block">
						<a href="<?php echo get_home_url(); ?>/wp-content/uploads/2016/03/dogovor.rar" title="">СКАЧАТЬ ДОГОВОР</a>
					</div>

					<div class="col-md-12">


						<?php
						$args = ['name' => 'dogovor-zayavlenie-na-postuplenie', 'post_type' => 'post', 'post_status' => 'publish'];
						$myposts = get_posts( $args );
						foreach( $myposts as $post ){ setup_postdata($post);
							//стандартный вывод записей
							?>
							<div class="content-text">
								<?php the_content() ?>
							</div>
						<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>




					</div>
				</div>


			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>