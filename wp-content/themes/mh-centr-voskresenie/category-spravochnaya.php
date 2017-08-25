<?php get_header() ?>
<div class="page-top">
	<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax1.jpg);"></div>
	<div class="container">
		<h1><span><?php echo single_cat_title(); ?></span></h1>
		<ul>
			<?php the_breadcrumb(); ?>
		</ul>
	</div>
</div><!--- PAGE TOP -->

<!--КАК ИЗБАВИТЬСЯ ОТ НАРКОТИКОВ-->
<section>
	<div class="block">
		<div class="container">
			<div class="row">

				<?php
					$idObj = get_category_by_slug('kak-izbavitsya-ot-narkotikov');/*Получаем категорию по слагу*/
					$cat_id = $idObj->term_id;
				?>
				<div class="title4"><h2 class="block-header"><?php echo get_cat_name($cat_id); ?></h2></div>

				<div class="service-listing">
					<?php
						$args = ['cat' => $cat_id,'orderby' => 'date', 'order' => 'ASC'];
						$myposts = get_posts( $args );
						foreach( $myposts as $post ){ setup_postdata($post);
							//стандартный вывод записей
					?>
							<div class="col-md-4 column">
								<div class="service-block">
									<div class="service-image">
										<?php echo the_post_thumbnail( [355,148] ); ?>
										<i class="fa fa-book"></i>
									</div>
									<h3><?php the_title() ?></h3>
									<p><?php echo short_exerpt(get_the_excerpt(),172,'...') ?></p>
									<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
								</div>
							</div>
						<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!--КАК ИЗБАВИТЬСЯ ОТ АЛКОГОЛЯ-->
<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<?php
				$idObj = get_category_by_slug('kak-izbavitsya-ot-alkogolya');/*Получаем категорию по слагу*/
				$cat_id = $idObj->term_id;
				?>
				<div class="title4"><h2 class="block-header"><?php echo get_cat_name($cat_id); ?></h2></div>

				<div class="service-listing">
					<?php
					$args = ['cat' => $cat_id,'orderby' => 'date', 'order' => 'ASC'];
					$myposts = get_posts( $args );
					foreach( $myposts as $post ){ setup_postdata($post);
						//стандартный вывод записей
						?>
						<div class="col-md-4 column">
							<div class="service-block">
								<div class="service-image">
									<?php echo the_post_thumbnail( [355,148] ); ?>
									<i class="fa fa-book"></i>
								</div>
								<h3><?php the_title() ?></h3>
								<p><?php echo short_exerpt(get_the_excerpt(),172,'...') ?></p>
								<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
							</div>
						</div>
					<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!--КАК ИЗБАВИТЬСЯ ОТ ТАБАКА-->
<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<?php
				$idObj = get_category_by_slug('kak-izbavitsya-ot-tabakokureniya');/*Получаем категорию по слагу*/
				$cat_id = $idObj->term_id;
				?>
				<div class="title4"><h2 class="block-header"><?php echo get_cat_name($cat_id); ?></h2></div>

				<div class="service-listing">
					<?php
					$args = ['cat' => $cat_id,'orderby' => 'date', 'order' => 'ASC'];
					$myposts = get_posts( $args );
					foreach( $myposts as $post ){ setup_postdata($post);
						//стандартный вывод записей
						?>
						<div class="col-md-4 column">
							<div class="service-block">
								<div class="service-image">
									<?php echo the_post_thumbnail( [355,148] ); ?>
									<i class="fa fa-book"></i>
								</div>
								<h3><?php the_title() ?></h3>
								<p><?php echo short_exerpt(get_the_excerpt(),172,'...') ?></p>
								<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
							</div>
						</div>
					<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!--Как избавиться от зависимости-->
<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<?php
				$idObj = get_category_by_slug('kak-izbavitsya-ot-zavisimosti');/*Получаем категорию по слагу*/
				$cat_id = $idObj->term_id;
				?>
				<div class="title4"><h2 class="block-header"><?php echo get_cat_name($cat_id); ?></h2></div>

				<div class="service-listing">
					<?php
					$args = ['cat' => $cat_id,'orderby' => 'date', 'order' => 'ASC'];
					$myposts = get_posts( $args );
					foreach( $myposts as $post ){ setup_postdata($post);
						//стандартный вывод записей
						?>
						<div class="col-md-4 column">
							<div class="service-block">
								<div class="service-image">
									<?php echo the_post_thumbnail( [355,148] ); ?>
									<i class="fa fa-book"></i>
								</div>
								<h3><?php the_title() ?></h3>
								<p><?php echo short_exerpt(get_the_excerpt(),172,'...') ?></p>
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