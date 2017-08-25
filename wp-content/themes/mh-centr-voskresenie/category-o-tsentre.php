
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
				<div class="col-md-6 column">
					<div class="simple-text">
						<?php
						$args = ['name' => 'kto-myi-i-v-chyom-nasha-missiya', 'post_type' => 'post', 'post_status' => 'publish'];
						$myposts = get_posts( $args );
						foreach( $myposts as $post ){ setup_postdata($post);
						//стандартный вывод записей
						?>
						<h3><strong><?php the_title() ?></strong></h3>
						<div class="content-text">
							<?php the_content() ?>
						</div>
						<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
					</div>
				</div>
				<div class="col-md-6 column">

					<div class="video">
						<?php
							$post = get_post_by_slug('video-o-tsentre');

						?>
<!--							<div class="video-img lightbox">-->
						<?php echo $post -> post_content; ?>
<!--							<img src="img/res/centr-foto-na-video.jpg" alt="" />-->
							<!-- -->
<!--							<a href="http://vimeo.com/44867610" title="" data-poptrox="vimeo"><i class="fa fa-play"></i></a>-->
<!--							</div>-->
					</div><!-- VIDEO -->
				</div>
			</div>
		</div>
	</div>
</section>


<section>
	<div class="block blackish">
		<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax3.jpg);"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 column">
					<div class="pastors-carousel">

						<?php
							$idObj = get_category_by_slug('nasha-komanda');/*Получаем категорию по слагу*/
							$cat_id = $idObj->term_id;
							$args = ['category' => $cat_id, 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'showposts' => '10'];
							$myposts = get_posts( $args );
						foreach( $myposts as $post ){ setup_postdata($post);
							//стандартный вывод записей
							?>
							<div class="pastors-message">
								<div class="row">
									<div class="col-md-3">
										<?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'middle-size-image', NULL, NULL); ?>
									</div>
									<div class="col-md-9">
										<h4><?php the_title() ?></h4>
										<span><?php echo get_post_meta($post->ID,'dolgnost',true); ?></span>
										<p><?php echo get_post_meta($post->ID,'description',true); ?></p>
									</div>
								</div>
							</div>
						<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<span>Коллектив Центра</span>
						<h2>НАШ <span>ПЕРСОНАЛ</span></h2>
					</div>
					<div class="row">
						<div class="team-carousel">
							<?php
								$idObj = get_category_by_slug('nasha-komanda');/*Получаем категорию по слагу*/
								$cat_id = $idObj->term_id;
								$args = ['category' => $cat_id, 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'showposts' => '10'];
								$myposts = get_posts( $args );
							foreach( $myposts as $post ){ setup_postdata($post);
								//стандартный вывод записей
							?>
							<div class="member">
								<div class="team">
									<div class="team-img">
										<?php echo the_post_thumbnail( [270,288] ); ?>
									</div>
									<div class="member-detail">
										<h3><a href="#" title=""><?php the_title(); ?></a></h3>
										<span><?php echo get_post_meta($post->ID,'dolgnost',true); ?></span>
										<p><?php echo get_post_meta($post->ID,'about',true); ?></p>
									</div>
								</div>
							</div><!-- MEMBER -->
							<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
						</div><!-- TEAM CAROUSEL -->
					</div>						
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block whitish">
		<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax6.jpg);"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 column">
					<div class="welcome">
						<h1>ЭКСКУРСИЯ<span> ПО ЦЕНТРУ</span></h1>
						<?php
							$idObj = get_category_by_slug('ekskursiya-po-tsentru');/*Получаем категорию по слагу*/
							$id = $idObj->term_id;
						?>
						<a href="<?php echo get_category_link($id) ?>" title="<?php echo get_cat_name($id) ?>">ВОЙТИ В ЦЕНТР</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer() ?>