<!--1 "миниатюра записи" обрезать вручную до размеров 270,288-->
<!--2 "миниатюра записи средний размер" обрезать вручную до размеров 370,403 -->
<!--3 "миниатюра записи полный размер" обрезать вручную до размеров 468,320 -->
<!--Дополнительные поля записей Наша Команда:-->
<!--1)Цитата - для просмотра одной записи (single-cat-other-all.php) - the_exerpt()-->
<!--2)description - идёт в карусель слайдер на новой странице-->
<!--3)about - описание к маленькой фото 270,288 Наша команда-->
<!--4)the_content () полное описание для Наша команда - страница полюдно в заголовках квал. врачи, психологи, и т.д-->


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
</div>

<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="remove-ext">
						<div class="team-page">
							<div class="row">
							<?php
								$idObj = get_category_by_slug('nasha-komanda');/*Получаем категорию по слагу*/
								$cat_id = $idObj->term_id;
								$args = ['category' => $cat_id, 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'showposts' => '10'];
								$myposts = get_posts( $args );
							foreach( $myposts as $post ){ setup_postdata($post);
								//стандартный вывод записей
								?>
								<div class="col-md-3">
									<div class="member">
										<div class="team">
											<div class="team-img">
												<?php echo the_post_thumbnail( [270,288] ); ?>
											</div>
											<div class="member-detail">
												<h3><a href="<?php echo get_category_link($cat_id) . '#' . $post -> post_name; ?>" title=""><?php the_title(); ?></a></h3>
												<span><?php echo get_post_meta($post->ID,'dolgnost',true); ?></span>
												<p><?php echo get_post_meta($post->ID,'about',true); ?></p>
											</div>
										</div>
									</div><!-- MEMBER -->
								</div>
								<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="vrachi"></div>
			<div id="nataliya"></div>
		</div>
	</div>
</section>


<?php
$idObj = get_category_by_slug('nasha-komanda');/*Получаем категорию по слагу*/
$parent_cat_id = $idObj->term_id;
$categories = get_categories('child_of=' . $parent_cat_id . '&hide_empty=0');;
$my_cats = [];
//Сортировка по произвольному полю категории cat_sort
foreach ($categories as $category) {
	$cat_data = get_option("category_" . $category -> term_id);
	$my_cats[(int)$cat_data['cat_sort']] = $category->term_id;
}
ksort($my_cats);
//Основной цикл
foreach ($my_cats as $child_cat_id) { ?>
			<?php
				$curr_cat_name =  get_cat_name( $child_cat_id );
				$args = ['category' => $child_cat_id, 'exclude' => '1044,201', 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'showposts' => '10'];
				$myposts = get_posts( $args );
			?>
			<div class="title4"><h2 class="block-header-nasha-komanda"><?php echo $curr_cat_name ?></h2></div>

			<?php foreach( $myposts as $post ) {
				setup_postdata($post);
				//стандартный вывод записей ?>
				<section>
					<div class="block remove-gap">
						<div class="container">
<!--							<div class="row">-->
<!--								<div id="--><?php //echo $post->post_name; ?><!--"></div>-->
<!--							</div>-->
							<div class="row">

								<?php if ( '1' === get_post_meta($post->ID,'image_in_left',true) ) {?>

									<div class="col-md-5 column">
										<div class="single-page">
											<?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'full-size-image', NULL, NULL); ?>
										</div><!-- PHOTO -->
									</div>

									<div class="col-md-7 column">
										<h3 class="sotrudnik-name" style="text-align: left;"><?php the_title(); ?></h3>
										<h5 class="sotrudnik-dolgnost" style="text-align: left;"><?php echo get_post_meta($post->ID,'dolgnost',true); ?></h5>
										<div class="content-text">
											<?php the_content(); ?>
										</div>
									</div>

								<?php } else if ( '0' === get_post_meta($post->ID,'image_in_left',true) ) {?>

									<div class="col-md-7 column">
										<h3 class="sotrudnik-name" style="text-align: right;"><?php the_title(); ?></h3>
										<h5 class="sotrudnik-dolgnost" style="text-align: right;"><?php echo get_post_meta($post->ID,'dolgnost',true); ?></h5>
										<div class="content-text">
											<?php the_content(); ?>
										</div><!-- komanda-text -->
									</div>

									<div class="col-md-5 column">
										<div class="single-page">
											<?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'full-size-image', NULL, NULL); ?>
										</div><!-- PHOTO -->
									</div>
								<?php } ?>

							</div>
							<?php if ( !empty( get_post_meta($post->ID,'next_cat_slug',true) ) ) {?>
								<div id="<?php echo get_post_meta($post->ID,'next_cat_slug',true) ?>"></div>
							<?php } ?>
							<?php if ( !empty( get_post_meta($post->ID,'next_post_slug',true) ) ) {?>
								<div id="<?php echo get_post_meta($post->ID,'next_post_slug',true) ?>"></div>
							<?php } ?>
						</div>

					</div>
				</section>
			<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
<?php }; ?>

<?php get_footer() ?>