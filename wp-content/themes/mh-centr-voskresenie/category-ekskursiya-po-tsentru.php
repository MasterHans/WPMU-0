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
		<div id="usloviya-prozhivaniya" ></div>
	</div>
</div><!--- PAGE TOP -->

<?php
$idObj = get_category_by_slug('ekskursiya-po-tsentru');/*Получаем категорию по слагу*/
$parent_cat_id = $idObj->term_id;
$categories = get_categories('child_of=' . $parent_cat_id . '&hide_empty=0');;
//Сортировка по произвольному полю категории cat_sort
foreach ($categories as $category) {
	$cat_data = get_option("category_" . $category -> term_id);
	$my_cats[(int)$cat_data['cat_sort']] = $category->term_id;
}
ksort($my_cats);
//Основной цикл
foreach ($my_cats as $child_cat_id) { ?>

<section>
<?php if ( 1 == get_option("category_" . $child_cat_id)['cat_sort'] ) {?>
	<div class="block">
<?php } else {?>
	<div class="block remove-gap">
<?php } ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="remove-ext">
						<div class="row">
							<div class="mas-gallery">
							<div class="title4"><h2 class="block-header"><?php echo get_cat_name($child_cat_id); ?></h2></div>
							<p class="excurs-text"><?php echo trim(get_option("category_" . $child_cat_id)['cat_content']); ?></p>
							<?php
								$curr_cat_name =  get_cat_name( $child_cat_id );
								$args = ['category' => $child_cat_id, 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'showposts' => '10'];
								$myposts = get_posts( $args );
							?>
							<?php foreach( $myposts as $post ) {
								setup_postdata($post);
								//стандартный вывод записей ?>
									<div class="col-md-4">
										<div class="gallery lightbox">
											<?php
												$thumb_id = get_post_thumbnail_id($post->ID);
												$thumb_url = wp_get_attachment_image_url($thumb_id,[370,253], true);

											?>
													<img src="<?php echo $thumb_url ?>" alt="" />
													<div class="gallery-title">
														<i class="fa fa-picture-o"></i>
														<h3><?php the_title(); ?></h3>
													</div>
														<ul>
													<?php
														//получаем все картинки из галлереи поста в виде массива
														$gallery = get_post_gallery( get_the_ID(), false );
														$ids_images = explode(',', $gallery['ids']);

														//получаем объект $attachments из медиа библиотеки по ID в виде массива где ключом является ключ массива $ids_images
														$args = array( 'include' => $gallery['ids'], 'post_mime_type' => 'image', 'post_type' => 'attachment', 'post_parent' => null, 'orderby' => 'name', 'order' => 'ASC');
														$attachments = get_children($args);
														$gallery_attachments_ids = [];
															if (!empty($gallery)) {
																foreach ($attachments as $attachment) {
																	if (!empty($attachment->guid)) {
																		$gallery_attachments_ids [array_search($attachment->ID, $ids_images)] = $attachment->ID;
																	};
																};
																//сортируем по ключу (в том порядке в котором картинки идут в медиатеке)
																ksort($gallery_attachments_ids);
																foreach ($gallery_attachments_ids as $gallery_attachment_id) { ?>
																	<li>
																		<a href="<?php echo wp_get_attachment_image_url($gallery_attachment_id, [770, 500]); ?>" title="">
																			<img src="<?php echo wp_get_attachment_image_url($gallery_attachment_id, [74, 67]); ?>"	alt="" title="<?php echo get_the_title($gallery_attachment_id) ?>"/>
																		</a>
																	</li>
																<?php };
															};
														 ?>
														</ul>
										</div><!-- GALLERY ITEM -->
									</div>
							<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if ( !empty( get_post_meta($post->ID,'next_cat_slug',true) ) ) {?>
			<div id="<?php echo get_post_meta($post->ID,'next_cat_slug',true) ?>"></div>
		<?php } ?>
		<?php wp_reset_postdata(); // сбрасываем переменную $post ?>
	</div>
</section>

<?php }; ?>

<?php get_footer() ?>