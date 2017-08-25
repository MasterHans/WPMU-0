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

<!--Три кита-->
<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="title4"><h2 class="block-header">Как мы работаем</h2></div>
				<div class="service-listing">

					<?php
					$idObj = get_category_by_slug('kak-myi-rabotaem');/*Получаем категорию по слагу*/
					$cat_id = $idObj->term_id;
					$args = ['category' => $cat_id, 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC'];
					$myposts = get_posts( $args );
					foreach( $myposts as $post ){ setup_postdata($post);
						//стандартный вывод записей
						?>
						<div class="col-md-4 column">
							<div class="service-block">

								<div class="service-image">
									<?php echo the_post_thumbnail( [355,148] ); ?>
									<i class="fa <?php echo get_post_meta($post->ID,'font_awesome',true) ?>"></i>
								</div>

								<h3><?php the_title() ?></h3>
								<?php the_excerpt(); ?>
								<a href="<?php echo get_category_link($cat_id) . '#' . $post->post_name; ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
							</div>
						</div>
					<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
				</div>
			</div>
		</div>
	</div>
</section>



<!--Как мы лечим-->
<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<div class="title4"><h2 class="block-header">Как мы лечим</h2></div>
				<div class="col-md-12 column">
					<div class="row">
						<div class="service-listing">
							<?php
							$idObj = get_category_by_slug('kak-myi-lechim');/*Получаем категорию по слагу*/
							$cat_id = $idObj->term_id;
							$args = ['category' => $cat_id, 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC'];
							$myposts = get_posts( $args );
							foreach( $myposts as $post ){ setup_postdata($post);
								//стандартный вывод записей
								?>
								<div class="col-md-4 column">
									<div class="service-block">

										<div class="service-image">
											<?php echo the_post_thumbnail( [355,148] ); ?>
											<i><img src="<?php echo get_template_directory_uri() . '/img/res/' . get_post_meta($post->ID,'font_awesome',true)?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" /></i>
										</div>

										<h3><?php the_title() ?></h3>
										<?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
									</div>
								</div>
							<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!--Наш распорядок и стоимость-->
<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<div class="title4"><h2 class="block-header">Наш распорядок и стоимость</h2></div>
				<div class="col-md-12 column">
					<div class="row">
						<div class="service-listing">
							<?php
							$idObj = get_category_by_slug('nash-rasporyadok-i-stoimost');/*Получаем категорию по слагу*/
							$cat_id = $idObj->term_id;
							$args = ['category' => $cat_id, 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC'];
							$myposts = get_posts( $args );
							foreach( $myposts as $post ){ setup_postdata($post);
								//стандартный вывод записей
								?>
								<div class="col-md-4 column">
									<div class="service-block">

										<div class="service-image">
											<?php echo the_post_thumbnail( [355,148] ); ?>
											<i class="fa <?php echo get_post_meta($post->ID,'font_awesome',true) ?>"></i>
										</div>

										<h3><?php the_title() ?></h3>
										<?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
									</div>
								</div>
							<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
						</div>
					</div>
				</div>
			</div>
</section>
<?php get_footer() ?>