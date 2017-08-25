<?php get_header(); ?>

<div class="page-top">
	<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax1.jpg);"></div>
	<div class="container">

		<h1>РЕЗУЛЬТАТЫ <span>ПОИСКА</span></h1>
		<ul>
			<?php the_breadcrumb(); ?>
		</ul>
	</div>
</div><!--- PAGE TOP -->


	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
						<div class="row">
							<div class="service-listing">
							<h2 class="block-header"><?php the_search_query(); ?></h2>

								<?php if (isset($_GET['s']) && empty($_GET['s'])){ ?>
									<div class="search-result">Строка поиска пустая. Введите слово или фразу для поиска.</div>
								<?php } else { ?>
								<?php if (have_posts()) : ?>
									<?php while (have_posts()) : the_post(); ?>
										<div class="col-md-4 column">
											<div class="service-block">
												<div class="service-image">
													<?php echo the_post_thumbnail( [355,148] ); ?>
													<i class="fa fa-search"></i>
												</div>
												<h3><?php the_title() ?></h3>
												<?php the_excerpt(); ?>
												<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
											</div>
										</div>
									<?php endwhile; ?>
								<?php else : ?>
									<div class="search-result">Поиск не дал результатов.</div>
								<?php endif; wp_reset_query() ?>
								<?php }; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>